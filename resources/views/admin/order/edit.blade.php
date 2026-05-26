@extends('admin.layouts.main')

@section('content')

<style>
    #thongbao{
        position:absolute;
        margin-bottom:0;
        width:350px;
        z-index:1000;
        right:22px;
    }

    .car-image{
        width:90px;
        height:60px;
        object-fit:cover;
        border-radius:6px;
        border:1px solid #ddd;
    }

    .car-color-badge{
        display:inline-block;
        padding:6px 12px;
        border-radius:30px;
        background:#f4f4f4;
        font-weight:600;
        margin-right:5px;
    }
</style>

<section class="content-header">

    <h1>
        <i class="fa fa-file-text-o"></i>
        Chi Tiết Đơn Đặt Cọc Xe
    </h1>

    <ol class="breadcrumb">
        <li>
            <a href="/">
                <i class="fa fa-dashboard"></i>
                Trang chủ
            </a>
        </li>

        <li>
            <a href="{{ route('admin.order.index') }}">
                DS Đơn Hàng
            </a>
        </li>
    </ol>

</section>

@if(session('msg'))

<div class="pad margin no-print">

    <div class="alert alert-success alert-dismissible"
         id="thongbao">

        <button type="button"
                class="close"
                data-dismiss="alert">

            ×

        </button>

        <h4>
            <i class="icon fa fa-check"></i>
            Thông báo !
        </h4>

        {{ session('msg') }}

    </div>

</div>

@endif

<section class="content">

    <div class="row">

        <div class="col-md-12">

            <div class="box box-primary">

                <form action="{{ route('admin.order.update',['order'=>$order->id]) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="box-header with-border">

                        <button type="submit"
                                class="btn btn-info btn-flat">

                            <i class="fa fa-edit"></i>
                            Cập nhật

                        </button>

                    </div>

                    <div class="box-body">

                        <table class="table table-bordered">

                            <tbody>

    <tr>

        <!-- CỘT TRÁI -->
        <td width="18%">
            <label>Mã ĐH :</label>
        </td>

        <td width="32%">
            {{ $order->code }}
        </td>

        <!-- CỘT PHẢI -->
        <td width="18%">
            <label>Showroom nhận xe :</label>
        </td>

        <td width="32%">
            {{ $order->showroom }}
        </td>

    </tr>

    <tr>

        <td>
            <label>Ngày đặt :</label>
        </td>

        <td>
            {{ $order->created_at }}
        </td>

        <td>
            <label>Quản lý showroom :</label>
        </td>

        <td>
            {{ $order->manager_name }}
        </td>

    </tr>

    <tr>

        <td>
            <label>Họ tên :</label>
        </td>

        <td>
            {{ $order->fullname }}
        </td>

        <td>
            <label>Tạm tính :</label>
        </td>

        <td>
            {{ number_format($order->total) }} đ
        </td>

    </tr>

    <tr>

        <td>
            <label>Số CCCD :</label>
        </td>

        <td>
            {{ $order->customer_cccd }}
        </td>

        <td>
            <label>Tiền cọc :</label>
        </td>

        <td style="color:red;font-weight:bold;">
            {{ number_format($order->payment_vnpay) }} đ
        </td>

    </tr>

    <tr>

        <td>
            <label>SĐT :</label>
        </td>

        <td>
            <a href="tel:{{ $order->phone }}" target="_blank">
                {{ $order->phone }}
            </a>
        </td>

        <td>
            <label>Trạng thái cọc :</label>
        </td>

        <td>

            <select class="form-control"
                name="payment_vnpay_status"
                style="max-width:200px;">

            <option value="0"
                {{ ($order->payment_vnpay_status == 0 ? 'selected' : '') }}>

                Chờ xác nhận cọc

            </option>

            <option value="1"
                {{ ($order->payment_vnpay_status == 1 ? 'selected' : '') }}>

                Đã xác nhận cọc

            </option>

            <option value="2"
                {{ ($order->payment_vnpay_status == 2 ? 'selected' : '') }}>

                Từ chối cọc

            </option>

        </select>

        </td>

    </tr>

    <tr>

        <td>
            <label>Email :</label>
        </td>

        <td>
            <a href="mailto:{{ $order->email }}" target="_blank">
                {{ $order->email }}
            </a>
        </td>

        <td>
            <label>Trạng thái đơn hàng :</label>
        </td>

        <td>

            <select class="form-control"
                    name="order_status_id"
                    style="max-width:200px;">

                @foreach($order_status as $status)

                    <option
                        value="{{ $status->id }}"
                        {{ ($order->order_status_id == $status->id ? 'selected' : '') }}>

                        {{ $status->name }}

                    </option>

                @endforeach

            </select>

        </td>

    </tr>

</tbody>

                        </table>

                    </div>

                </form>

            </div>

            <!-- DANH SÁCH XE -->

            <div class="box">

                <div class="box-header with-border">

                    <h3 class="box-title">
                        Thông tin xe đặt cọc
                    </h3>

                </div>

                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>

                            <tr>

                                <th width="5%">TT</th>

                                <th width="20%">
                                    Tên xe
                                </th>

                                <th width="12%">
                                    Ảnh màu xe
                                </th>

                                <th>
                                    Màu ngoại thất
                                </th>

                                <th>
                                    Màu nội thất
                                </th>

                                <th>
                                    SKU
                                </th>

                                <th>
                                    Số lượng
                                </th>

                                <th>
                                    Giá xe
                                </th>

                                <th>
                                    Giá xe sau cọc
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($order->details as $key => $item)

                            <tr>

                                <td>
                                    {{ $key + 1 }}
                                </td>

                                <td>

                                    <a href="{{ route('admin.product.edit',['product'=>$item->product_id]) }}">

                                        {{ $item->name }}

                                    </a>

                                </td>

                                <td>

                                    @if($item->image)

                                        <img src="{{ asset('storage/'.$item->image) }}"
                                             class="car-image">

                                    @endif

                                </td>

                                <td>

                                    <span class="car-color-badge">

                                        {{ $order->exterior_color }}

                                    </span>

                                </td>

                                <td>

                                    <span class="car-color-badge">

                                        {{ $order->interior_color }}

                                    </span>

                                </td>

                                <td>
                                    {{ $item->sku }}
                                </td>

                                <td>
                                    {{ $item->qty }}
                                </td>

                                <td>

                                    {{ number_format($item->price) }} đ

                                </td>

                                <td style="color:red;font-weight:bold;">

                                   {{ number_format(($item->price * $item->qty) - $order->payment_vnpay) }} đ

                                </td>

                            </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection

@section('my_javascript')

<script>

$(function(){

    setTimeout(function(){

        $("#thongbao").fadeOut();

    },3000);

});

</script>

@endsection