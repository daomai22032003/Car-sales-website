<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category; // cần thêm dòng này nếu chưa có
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Statistical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CartController extends GeneralController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        $products = [];
        if (Auth::check()) {
            $cartItems = Auth::user()->cartItems()->with('product')->get();
            foreach ($cartItems as $item) {
                $products[] = [
                    'qty' => $item->quantity,
                    'price' => $item->quantity * $item->product->sale,
                    'item' => $item->product
                ];
            }
        } else {
            $rawCart = session('cart');
            if ($rawCart && $rawCart instanceof \App\Models\Cart) {
                $products = $rawCart->products;
            }
        }

        return view('shop.cart', compact('products'));
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $product = Product::find($id);

        if (!$product) {
            return $this->notfound();
        }

        $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1,
                'price' => $product->sale
            ]);
        }

        return redirect()->route('shop.cart');
    }

    // Xóa sp khỏi giỏ hàng
    public function removeToCart(Request $request, $id)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->where('product_id', $id)->delete();
        }

        return view('shop.components.cart');
    }

    // Cập nhật lại giỏ hàng
    public function updateToCart(Request $request)
    {
        // check nhập số lượng không đúng định dạng
        $validator = Validator::make($request->all(), [
            'qty' => 'required|numeric|min:1',
        ]);

        // check số lượng lỗi
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'msg' => 'Số lượng nhập không hợp lệ'
            ]);
        }

        if (Auth::check()) {
            $product_id = $request->input('id');
            $qty = $request->input('qty');

            CartItem::where('user_id', Auth::id())->where('product_id', $product_id)->update(['quantity' => $qty]);

            return response()->json([
                'status' => true,
                'data' => view('shop.components.cart')->render()
            ]);
        }

        return response()->json([
            'status' => false,
            'msg' => 'Vui lòng đăng nhập'
        ]);
    }

    // Check mã giảm giá
    public function checkCoupon(Request $request)
    {
        $coupon_code = $request->query('coupon_code');

        $coupon = Coupon::where('code', $coupon_code)->first();

        if (!$coupon) {
            return redirect()->back()->withErrors(['errorCoupon' => 'Mã giảm giá không tồn tại']);
        }


        $_cart = session('cart'); // lấy thông tin giỏ hàng
        $discount = 0; // số tiền được giảm giá , default = 0

        // check default tính theo giá
        if ($coupon->value) {
            $discount = $coupon->value;
        } else {
            if ($coupon->percent) {
                // tính theo %
                $discount = ($coupon->percent * $_cart->totalPrice) / 100;
            }
        }

        // Get lại giỏ hàng
        $cart = new Cart($_cart);
        $cart->discount = $discount; // set số tiền được giảm
        $cart->coupon = $coupon->code;

        // Lưu thông tin vào session
        $request->session()->put('cart', $cart);

        return redirect()->back();
    }

    // Hủy đơn hàng
    public function destroy(Request $request)
    {
        // remove session
        $request->session()->forget('cart');

        return redirect('/');
    }

    // Trang đặt cọc thành công
    public function depositSuccess(Request $request)
    {
        $orderCode = $request->query('order_code', '');
        return view('shop.deposit-success', compact('orderCode'));
    }

    // Thanh toán
    public function checkout()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục thanh toán.');
        }

        $user = Auth::user();
        return view('shop.checkout', compact('user'));
    }

    // thêm đơn hàng
    public function postCheckout(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItems = Auth::user()->cartItems()->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect('/');
        }

        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ]);

        // Tính toán tổng tiền từ database
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->sale;
        }

        $discount = session('discount_amount', 0);
        $coupon = session('coupon_code', null);

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->user_id = Auth::id(); // Gán ID người dùng
        $order->fullname = $request->input('fullname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order->total = $totalPrice;
        $order->discount = $discount;
        $order->coupon = $coupon;
        $order->order_status_id = 1; // 1 = mới
        // Tạo mã đơn hàng gửi tới khách hàng
        $order->code = 'DH-' . date('d') . date('m') . date('Y') . '-' . time();
        if ($order->save()) {
            $id_order = $order->id;
            foreach ($cartItems as $item) {
                $_detail = new OrderDetail();
                $_detail->order_id = $id_order;
                $_detail->name = $item->product->name;
                $_detail->image = $item->product->image;
                $_detail->sku = $item->product->sku;
                $_detail->product_id = $item->product->id;
                $_detail->qty = $item->quantity;
                $_detail->price = $item->quantity * $item->product->sale;
                $_detail->user_id = $item->product->user_id;
                $_detail->save();

                // Giam số lượng trong kho
                $product_model = Product::find($item->product->id);
                if ($product_model) {
                    $product_model->stock = $product_model->stock - $item->quantity;
                    $product_model->save();
                }
            }

            $statistical = new Statistical();
            $statistical->total_quantity = $cartItems->sum('quantity');
            $statistical->total_price = $totalPrice;
            $statistical->period = Carbon::now();
            $statistical->id_user = $order->id;
            $statistical->id_status = 0;
            $statistical->save();

            // Xóa thông tin giỏ hàng Trong Database
            Auth::user()->cartItems()->delete();
            session()->forget(['coupon_code', 'discount_amount', 'cart']);

            // gửi email cho KH


            return redirect()->route('shop.cart.checkout')
                ->with('msg', 'Cảm ơn bạn đã đặt hàng. Mã đơn hàng của bạn : #' . $order->code);
        }
        return redirect()->back()->with('error', 'Có lỗi xảy ra khi tạo đơn hàng.');
    }

    public function vnpay(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
        ], [
            'fullname.required' => 'Họ và tên không được để trống.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'address.required' => 'Địa chỉ nhận hàng không được để trống.',
        ]);

        $cartItems = Auth::user()->cartItems()->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect('/');
        }

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->sale;
        }

        $data = $request->all();
        session(['data_checkout' => $data]);

        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('shop.cart.vnpay_done');
        $vnp_TmnCode = "44HSQHSP";//Mã website tại VNPAY
        $vnp_HashSecret = "F0EDRCHEZW6MJ3H9QJO36K8LMI0V1SU1"; //Chuỗi bí mật

        $vnp_TxnRef = mt_rand(100000, 999999);
        $vnp_OrderInfo = 'Thanh toán đơn hàng';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $totalPrice * 10;
        $vnp_Locale = 'vn';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        // $fullname = $request->input('fullname');
        // $phone = $request->input('phone');
        // $email = $request->input('email');
        // $address = $request->input('address');
        // $note = $request->input('note');

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00'
            ,
            'message' => 'success'
            ,
            'data' => $vnp_Url
        );

        // header('Location: ' . $vnp_Url);
        return redirect()->away($vnp_Url);

    }

    public function vnpayDone(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $cartItems = Auth::user()->cartItems()->with('product')->get();
        if ($cartItems->isEmpty()) {
            return redirect('/');
        }

        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $totalPrice += $item->quantity * $item->product->sale;
        }

        $_data = session('data_checkout');
        $_data_checkout = (object) $_data;
        $discount = session('discount_amount', 0);
        $coupon = session('coupon_code', null);

        // Lưu vào bảng đơn đặt hàng - orders
        $order = new Order();
        $order->user_id = Auth::id(); // Gán ID người dùng
        $order->fullname = $_data_checkout->fullname;
        $order->phone = $_data_checkout->phone;
        $order->email = $_data_checkout->email;
        $order->address = $_data_checkout->address;
        $order->note = $_data_checkout->note;
        $order->payment_vnpay = $totalPrice / 10;
        $order->total = $totalPrice;
        $order->discount = $discount;
        $order->coupon = $coupon;
        $order->order_status_id = 1; // 1 = mới
        $order->payment_vnpay_status = 1; // 1 = chờ xác nhận
        // Tạo mã đơn hàng gửi tới khách hàng
        $order->code = 'DH-' . date('d') . date('m') . date('Y') . '-' . time();
        if ($order->save()) {
            $id_order = $order->id;
            foreach ($cartItems as $item) {
                $_detail = new OrderDetail();
                $_detail->order_id = $id_order;
                $_detail->name = $item->product->name;
                $_detail->image = $item->product->image;
                $_detail->sku = $item->product->sku;
                $_detail->product_id = $item->product->id;
                $_detail->qty = $item->quantity;
                $_detail->price = $item->quantity * $item->product->sale;
                $_detail->user_id = $item->product->user_id;
                $_detail->save();

                // Giam số lượng trong kho
                $product_model = Product::find($item->product->id);
                if ($product_model) {
                    $product_model->stock = $product_model->stock - $item->quantity;
                    $product_model->save();
                }
            }

            $statistical = new Statistical();
            $statistical->total_quantity = $cartItems->sum('quantity');
            $statistical->total_price = $totalPrice;
            $statistical->period = Carbon::now();
            $statistical->id_user = $order->id;
            $statistical->id_status = 0;
            $statistical->save();

            // Xóa thông tin giỏ hàng Trong Database & Session
            Auth::user()->cartItems()->delete();
            $request->session()->forget(['cart', 'data_checkout', 'coupon_code', 'discount_amount']);

            // gửi email cho KH


            return redirect()->route('shop.cart.deposit_success', ['order_code' => $order->code]);
        }
    }
}
