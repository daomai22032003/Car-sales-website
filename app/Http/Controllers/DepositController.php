<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductColorImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositSuccessMail;
class DepositController extends Controller
{
    public function vnpay(Request $request)
    {
        if($request->payment_method == 'cash'){

    $product = Product::find(
        $request->product_id
    );

    if(!$product){
        return redirect('/');
    }

    // TẠO ĐƠN
    $order = new Order();

    $order->user_id = Auth::id();

    $order->fullname =
        $request->customer_name;

    $order->phone =
        $request->customer_phone;

    $order->email =
        $request->customer_email;

    $order->note =
        'Khách gửi đơn trực tiếp';

    $order->total = str_replace(
        ['VNĐ','.',' ',','],
        '',
        $request->car_price
    );

    // KHÔNG THANH TOÁN ONLINE
    $order->payment_vnpay = 0;

    $order->payment_vnpay_status = 0;

    $order->order_status_id = 1;

    $order->code =
        'DC-' . date('dmY') . '-' . time();

    $order->product_color_id =
        $request->product_color_id;

    $order->customer_cccd =
        $request->customer_cccd;

    $order->showroom =
        $request->showroom;

    $order->manager_name =
        $request->manager_name;

    $order->exterior_color =
        $request->exterior_color;

    $order->interior_color =
        $request->interior_color;

    $order->save();

    // DETAIL
    $detail = new OrderDetail();

    $detail->order_id = $order->id;

    $detail->product_id = $product->id;

    $detail->name = $product->name;

    $productColorImage =
        ProductColorImage::where(
            'product_color_id',
            $request->product_color_id
        )->first();

    $detail->image =
        $productColorImage->image
        ?? $product->image;

    $detail->sku = $product->sku;

    $detail->qty = 1;

    $detail->price = str_replace(
        ['VNĐ','.',' ',','],
        '',
        $request->car_price
    );

    $detail->save();

    // TRỪ KHO
    $product->stock -= 1;

    $product->save();
// GỬI MAIL
//Mail::to($order->email)
   // ->send(new DepositSuccessMail($order));
    return redirect()->route(
        'shop.cart.deposit_success',
        [
            'order_code' => $order->code
        ]
    );
}
        session([
            'deposit_data' => $request->all()
        ]);

        $vnp_Url =
            "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

        $vnp_Returnurl =
            route('deposit.vnpay_done');

        $vnp_TmnCode = "44HSQHSP";

        $vnp_HashSecret =
            "F0EDRCHEZW6MJ3H9QJO36K8LMI0V1SU1";

        $depositPrice = str_replace(
            ['VNĐ', '.', ',', ' '],
            '',
            $request->deposit_price
        );

        $vnp_Amount = (int)$depositPrice * 100;

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $_SERVER['REMOTE_ADDR'],
            "vnp_Locale" => "vn",
            "vnp_OrderInfo" => "Dat coc xe",
            "vnp_OrderType" => "billpayment",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => rand(100000,999999),
        );

        ksort($inputData);

        $query = "";

        $hashdata = "";

        $i = 0;

        foreach ($inputData as $key => $value) {

            if ($i == 1) {
                $hashdata .= '&'.urlencode($key)
                    ."=".urlencode($value);
            } else {
                $hashdata .= urlencode($key)
                    ."=".urlencode($value);

                $i = 1;
            }

            $query .= urlencode($key)
                ."=".urlencode($value).'&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        $vnpSecureHash = hash_hmac(
            'sha512',
            $hashdata,
            $vnp_HashSecret
        );

        $vnp_Url .=
            'vnp_SecureHash=' . $vnpSecureHash;

        return redirect()->away($vnp_Url);
    }
public function destroy(Request $request)
{
    $request->session()->forget('cart');

    $request->session()->forget(
        'deposit_data'
    );

    return redirect()
        ->route('shop.empty.cart');
}
    public function vnpayDone(Request $request)
{
    
    $data = session('deposit_data');

    if(!$data){
        return redirect('/');
    }

    $product = Product::find($data['product_id']);

    if(!$product){
        return redirect('/');
    }

    // Tạo đơn hàng
    $order = new Order();

    $order->user_id = Auth::id();

    $order->fullname =
        $data['customer_name'];

    $order->phone =
        $data['customer_phone'];

    $order->email =
        $data['customer_email'];

    $order->note =
        'Đặt cọc xe';

    $order->total =
        str_replace(
            ['VNĐ','.',' ',','],
            '',
            $data['car_price']
        );

    $order->payment_vnpay =
        str_replace(
            ['VNĐ','.',' ',','],
            '',
            $data['deposit_price']
        );

    $order->payment_vnpay_status = 0;

    $order->order_status_id = 1;

    $order->code =
        'DC-' . date('dmY') . '-' . time();
    $order->product_color_id =
        $data['product_color_id'];
        $order->customer_cccd =
    $data['customer_cccd'];

$order->showroom =
    $data['showroom'];

$order->manager_name =
    $data['manager_name'];

$order->exterior_color =
    $data['exterior_color'];

$order->interior_color =
    $data['interior_color'];
    $order->save();

    // Chi tiết đơn hàng
    $detail = new OrderDetail();

    $detail->order_id = $order->id;

    $detail->product_id = $product->id;

    $detail->name = $product->name;
    $productColorImage = ProductColorImage::where(
    'product_color_id',
    $data['product_color_id']
    )->first();

    $detail->image =
    $productColorImage->image ?? $product->image;

    $detail->sku = $product->sku;

    $detail->qty = 1;

    $detail->price = str_replace(
    ['VNĐ','.',' ',','],
    '',
    $data['car_price']
);

    
    $detail->save();

// GỬI MAIL XÁC NHẬN
//Mail::to($order->email)
   // ->send(new DepositSuccessMail($order));
// Trừ kho
$order->payment_vnpay_status = 0;

$order->order_status_id = 1;

session()->forget('deposit_data');

return redirect()->route(
    'shop.cart.deposit_success',
    [
        'order_code' => $order->code
    ]
);
    // Trừ kho
   $order->payment_vnpay_status = 0; // đã cọc
$order->order_status_id = 1; // chờ xử lý

    session()->forget('deposit_data');

    return redirect()->route(
        'shop.cart.deposit_success',
        [
            'order_code' => $order->code
        ]
    );
}
}