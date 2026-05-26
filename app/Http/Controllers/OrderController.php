<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\DepositSuccessMail;
class OrderController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('tu-khoa');
        $statusId = $request->input('status');
        $paymentStatus = $request->input('payment_status');

        $query = Order::query();

        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('code', 'like', '%' . $keyword . '%')
                  ->orWhere('fullname', 'like', '%' . $keyword . '%')
                  ->orWhere('phone', 'like', '%' . $keyword . '%');
            });
        }

        if ($statusId !== null && $statusId !== '') {
            $query->where('order_status_id', $statusId);
        }

        if ($paymentStatus !== null && $paymentStatus !== '') {
            $query->where('payment_vnpay_status', $paymentStatus);
        }

        $orders = $query->latest()->paginate(20);

        return view('admin.order.index', [
            'data' => $orders,
            'filter' => [
                'keyword' => $keyword,
                'status' => $statusId,
                'payment_status' => $paymentStatus,
            ],
            'order_status' => OrderStatus::all()
        ]);
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $order_status = OrderStatus::all();

        return view('admin.order.edit', compact('order', 'order_status'));
    }
    
public function update(Request $request, $id)
{
    $order = Order::with('details')->findOrFail($id);

    // trạng thái cũ
    $oldPaymentStatus =
        (int)$order->payment_vnpay_status;

    $oldStatus =
        (int)$order->order_status_id;

    $newStatus =
        (int)$request->order_status_id;

    // update dữ liệu
    $order->address =
        $request->address;

    $order->note =
        $request->note;

    $order->order_status_id =
        $newStatus;

    $order->payment_vnpay_status =
        $request->payment_vnpay_status;

    $order->save();

    // GỬI MAIL
    // khi admin xác nhận cọc
    
    if(
        $oldPaymentStatus == 0 &&
        $request->payment_vnpay_status == 1
    ){

       try {

    Mail::to($order->email)
        ->send(
            new DepositSuccessMail($order)
        );

   

} catch (\Exception $e) {

    dd($e->getMessage());

}
    }

    // Trừ kho khi hoàn thành
    if ($oldStatus != 3 && $newStatus == 3) {

        foreach ($order->details as $item) {

            DB::table('products')
                ->where('id', $item->product_id)
                ->decrement('stock', $item->qty);
        }
    }

    return redirect()->back()
        ->with(
            'msg',
            'Cập nhật đơn hàng thành công'
        );
}
    public function destroy($id)
    {
        Order::destroy($id);

        return response()->json([
            'status' => true
        ]);
    }

    public function removeToCart(Request $request)
    {
        return response()->json([
            'status' => true,
            'data' => 'Xóa sản phẩm thành công'
        ]);
    }
}