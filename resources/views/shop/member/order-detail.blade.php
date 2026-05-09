@extends('shop.layouts.main')

@section('content')

<section class="member-detail-section"
         style="padding:60px 0;
                background:#f8fafc;">

    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <nav aria-label="breadcrumb">

                    <ol class="breadcrumb"
                        style="background:none;
                               padding-left:0;
                               margin-bottom:30px;">

                        <li class="breadcrumb-item">
                            <a href="/"
                               style="color:#1e88e5;">
                                Trang chủ
                            </a>
                        </li>

                        <li class="breadcrumb-item">
                            <a href="{{ route('member.order.history') }}"
                               style="color:#1e88e5;">

                                Lịch sử đơn hàng

                            </a>
                        </li>

                        <li class="breadcrumb-item active">

                            #{{ $order->code }}

                        </li>

                    </ol>

                </nav>

            </div>

        </div>

        <div class="row">

            <!-- LEFT -->

            <div class="col-lg-8">

                <div style="background:#fff;
                            border-radius:18px;
                            padding:35px;
                            box-shadow:0 5px 20px rgba(0,0,0,.05);">

                    <div style="display:flex;
                                justify-content:space-between;
                                align-items:center;
                                margin-bottom:30px;
                                border-bottom:1px solid #eee;
                                padding-bottom:20px;">

                        <h2 style="font-size:26px;
                                   font-weight:800;
                                   color:#1a2a5a;
                                   margin:0;">

                            Chi tiết đặt cọc xe

                        </h2>

                        <span style="font-size:14px;
                                     color:#777;">

                            Mã đơn:
                            #{{ $order->code }}

                        </span>

                    </div>

                    <!-- XE -->

                    <div style="display:flex;
                                gap:25px;
                                align-items:center;">
@php

$productColorImage = \App\Models\ProductColorImage::where(
    'product_color_id',
    $order->product_color_id
)->first();

@endphp
                       <img

src="

@if($productColorImage)

    {{ asset('storage/'.$productColorImage->image) }}

@else

    {{ asset($order->details[0]->image) }}

@endif

"

style="width:260px;
       border-radius:16px;
       object-fit:cover;">

                        <div>

                            <h3 style="font-size:24px;
                                       font-weight:800;
                                       margin-bottom:20px;
                                       color:#222;">

                                {{ $order->details[0]->name }}

                            </h3>

                            <p>
                                <b>Ngoại thất:</b>
                                {{ $order->exterior_color }}
                            </p>

                            <p>
                                <b>Nội thất:</b>
                                {{ $order->interior_color }}
                            </p>

                           

                        </div>

                    </div>

                    <!-- THANH TOÁN -->

                    <div style="margin-top:35px;
                                background:#f8fafc;
                                border-radius:16px;
                                padding:25px;">

                        <h4 style="font-weight:700;
                                   margin-bottom:20px;">

                            Thông tin thanh toán

                        </h4>

                        <div style="display:flex;
                                    justify-content:space-between;
                                    margin-bottom:12px;">

                            <span>Giá xe:</span>

                            <b>
                                {{ number_format($order->total,0,',','.') }}đ
                            </b>

                        </div>

                        <div style="display:flex;
                                    justify-content:space-between;">

                            <span>Tiền đặt cọc:</span>

                            <b style="color:#16a34a;
                                      font-size:18px;">

                                {{ number_format($order->payment_vnpay,0,',','.') }}đ

                            </b>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div class="col-lg-4">

                <!-- KHÁCH HÀNG -->

                <div style="background:#fff;
                            border-radius:18px;
                            padding:30px;
                            box-shadow:0 5px 20px rgba(0,0,0,.05);
                            margin-bottom:25px;">

                    <h3 style="font-size:20px;
                               font-weight:800;
                               margin-bottom:25px;
                               color:#1a2a5a;">

                        Thông tin khách hàng

                    </h3>

                    <div style="margin-bottom:18px;">

                        <label style="font-size:12px;
                                      color:#999;
                                      font-weight:700;
                                      display:block;">

                            Họ và tên

                        </label>

                        <p style="font-weight:600;">
                            {{ $order->fullname }}
                        </p>

                    </div>

                    <div style="margin-bottom:18px;">

                        <label style="font-size:12px;
                                      color:#999;
                                      font-weight:700;
                                      display:block;">

                            Số điện thoại

                        </label>

                        <p style="font-weight:600;">
                            {{ $order->phone }}
                        </p>

                    </div>

                    <div style="margin-bottom:18px;">

                        <label style="font-size:12px;
                                      color:#999;
                                      font-weight:700;
                                      display:block;">

                            Email

                        </label>

                        <p style="font-weight:600;">
                            {{ $order->email }}
                        </p>

                    </div>

                    <div>

                        <label style="font-size:12px;
                                      color:#999;
                                      font-weight:700;
                                      display:block;">

                            Số CCCD

                        </label>

                        <p style="font-weight:600;">
                            {{ $order->customer_cccd }}
                        </p>

                    </div>

                </div>

                <!-- TRẠNG THÁI -->

                <div style="background:#fff;
                            border-radius:18px;
                            padding:30px;
                            box-shadow:0 5px 20px rgba(0,0,0,.05);">

                    <h3 style="font-size:20px;
                               font-weight:800;
                               margin-bottom:25px;
                               color:#1a2a5a;">

                        Trạng thái đơn hàng

                    </h3>

                    @php

                        $statusLabel = 'Mới nhận';
                        $statusDesc  = 'Đơn đặt cọc đã được ghi nhận.';
                        $statusIcon  = 'fa-clock-o';
                        $statusColor = '#2196f3';

                        if($order->order_status_id == 2){

                            $statusLabel = 'Đang xử lý';
                            $statusDesc  = 'Showroom đang xử lý hồ sơ.';
                            $statusIcon  = 'fa-cogs';
                            $statusColor = '#ff9800';

                        }

                        elseif($order->order_status_id == 3){

                            $statusLabel = 'Hoàn thành';
                            $statusDesc  = 'Đơn đặt cọc đã hoàn tất.';
                            $statusIcon  = 'fa-check-circle';
                            $statusColor = '#16a34a';

                        }

                        elseif($order->order_status_id == 4){

                            $statusLabel = 'Đã hủy';
                            $statusDesc  = 'Đơn đặt cọc đã bị hủy.';
                            $statusIcon  = 'fa-times-circle';
                            $statusColor = '#ef4444';

                        }

                    @endphp

                    <div style="display:flex;
                                align-items:flex-start;">

                        <div style="width:48px;
                                    height:48px;
                                    border-radius:14px;
                                    background:{{ $statusColor }};
                                    color:#fff;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-size:22px;
                                    margin-right:15px;">

                            <i class="fa {{ $statusIcon }}"></i>

                        </div>

                        <div>

                            <p style="font-size:18px;
                                      font-weight:700;
                                      color:{{ $statusColor }};
                                      margin-bottom:6px;">

                                {{ $statusLabel }}

                            </p>

                            <p style="font-size:13px;
                                      color:#666;
                                      line-height:1.6;">

                                {{ $statusDesc }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection