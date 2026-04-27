<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Statistical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $order_status = OrderStatus::all();

        return view('admin.order.edit', [
            'order' => $order,
            'order_status' => $order_status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $address2 = $request->address2;
        $note = $request->note;
        $id_status = $request->order_status_id;
        $payment_status = $request->payment_vnpay_status;

        $order = Order::findorFail($id);
        $order->address2 = $address2;
        $order->note = $note;
        $order->order_status_id = $id_status;
        $order->payment_vnpay_status = $payment_status;
        $order->save();

        // Đồng bộ sang bảng statistical (id_user trong statistical thực tế lưu order_id)
        Statistical::where('id_user', $id)->update([
            'id_status' => $id_status,
            'total_price' => $order->total
        ]);

        return redirect()->back()->with('msg', 'Cập nhật đơn hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Xóa đơn hàng
        Order::destroy($id);
        // Xóa dữ liệu thống kê tương ứng
        Statistical::where('id_user', $id)->delete();

        return response()->json([
            'status' => true
        ], 200);
    }

    public function removeToCart(Request $request)
    {
        $order_detail_id = $request->input('order_detail_id');
        $order_id = $request->input('order_id');

        return response()->json([
            'status' => true,
            'data' => 'Xóa sản phẩm thành công'
        ]);
    }
}
