@extends('shop.layouts.main')

@section('content')
    <section class="member-detail-section" style="padding: 60px 0; background: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background: none; padding-left: 0; margin-bottom: 30px;">
                            <li class="breadcrumb-item"><a href="/" style="color: #1e88e5;">Trang chủ</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('member.order.history') }}"
                                    style="color: #1e88e5;">Lịch sử đơn hàng</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết đơn hàng #{{ $order->code }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="order-detail-card"
                        style="background: white; border-radius: 12px; padding: 35px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; margin-bottom: 30px;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 1px solid #f0f0f0; padding-bottom: 20px;">
                            <h2 style="font-weight: 800; color: #1a2a5a; font-size: 24px; margin: 0;">Thông tin sản phẩm
                            </h2>
                            <span style="color: #666; font-size: 14px;">Mã đơn: #{{ $order->code }}</span>
                        </div>

                        <div class="product-list">
                            @foreach($order->details as $item)
                                <div class="product-item"
                                    style="display: flex; align-items: center; padding: 15px 0; border-bottom: 1px solid #f9f9f9;">
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                        style="width: 80px; height: 60px; object-fit: cover; border-radius: 10px; margin-right: 20px;">
                                    <div style="flex: 1;">
                                        <h4 style="font-size: 16px; font-weight: 700; color: #333; margin: 0 0 5px 0;">
                                            {{ $item->name }}</h4>
                                        <p style="color: #666; font-size: 13px; margin: 0;">Số lượng: {{ $item->qty }}</p>
                                    </div>
                                    <div style="text-align: right;">
                                        <span
                                            style="font-weight: 700; color: #b02a2a; font-size: 16px;">{{ number_format($item->price * $item->qty, 0, ',', '.') }}đ</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="order-summary"
                            style="margin-top: 30px; background: #fcfcfc; padding: 25px; border-radius: 15px;">
                            <div style="display: flex; justify-content: space-between; margin-bottom: 10px; color: #666;">
                                <span>Tổng tiền hàng:</span>
                                <span>{{ number_format($order->total + $order->discount, 0, ',', '.') }}đ</span>
                            </div>
                            <div style="display: flex; justify-content: space-between; margin-bottom: 10px; color: #666;">
                                <span>Giảm giá:</span>
                                <span>-{{ number_format($order->discount, 0, ',', '.') }}đ</span>
                            </div>
                            <div
                                style="display: flex; justify-content: space-between; margin-top: 15px; border-top: 1px solid #eee; padding-top: 15px;">
                                <span style="font-weight: 800; font-size: 18px; color: #1a2a5a;">Tổng thanh toán:</span>
                                <span
                                    style="font-weight: 800; font-size: 20px; color: #b02a2a;">{{ number_format($order->total, 0, ',', '.') }}đ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="customer-info-card"
                        style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0; margin-bottom: 30px;">
                        <h3
                            style="font-weight: 800; color: #1a2a5a; font-size: 18px; margin-bottom: 25px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                            Thông tin khách hàng</h3>

                        <div style="margin-bottom: 20px;">
                            <label
                                style="display: block; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Họ
                                và tên</label>
                            <p style="font-weight: 600; color: #333; margin: 0;">{{ $order->fullname }}</p>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label
                                style="display: block; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Số
                                điện thoại</label>
                            <p style="font-weight: 600; color: #333; margin: 0;">{{ $order->phone }}</p>
                        </div>

                        <div style="margin-bottom: 20px;">
                            <label
                                style="display: block; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Địa
                                chỉ nhận hàng</label>
                            <p style="font-weight: 600; color: #333; margin: 0;">{{ $order->address }}</p>
                        </div>

                        <div style="margin-bottom: 0;">
                            <label
                                style="display: block; font-size: 12px; color: #999; text-transform: uppercase; font-weight: 700; margin-bottom: 5px;">Ghi
                                chú</label>
                            <p style="color: #666; margin: 0;">{{ $order->note ?: 'Không có ghi chú' }}</p>
                        </div>
                    </div>

                    <div class="order-status-card"
                        style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                        <h3
                            style="font-weight: 800; color: #1a2a5a; font-size: 18px; margin-bottom: 25px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                            Trạng thái đơn hàng</h3>
                        @php
                            $statusLabel = 'Mới nhận';
                            $statusDesc = 'Đơn hàng đã được ghi nhận và đang chờ xử lý.';
                            $statusIcon = 'fa-clock-o';
                            $statusColor = '#2196f3';

                            if ($order->order_status_id == 2) {
                                $statusLabel = 'Đang xử lý';
                                $statusDesc = 'Đội ngũ DailyXe đang kiểm tra và chuẩn bị hồ sơ.';
                                $statusIcon = 'fa-cogs';
                                $statusColor = '#ff9800';
                            } elseif ($order->order_status_id == 3) {
                                $statusLabel = 'Hoàn thành';
                                $statusDesc = 'Giao dịch đã hoàn tất thành công.';
                                $statusIcon = 'fa-check-circle';
                                $statusColor = '#4caf50';
                            } elseif ($order->order_status_id == 4) {
                                $statusLabel = 'Đã hủy';
                                $statusDesc = 'Đơn hàng đã bị hủy bỏ.';
                                $statusIcon = 'fa-times-circle';
                                $statusColor = '#f44336';
                            }
                        @endphp
                        <div style="display: flex; align-items: flex-start;">
                            <div
                                style="background: {{ $statusColor }}; color: white; width: 40px; height: 40px; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px; font-size: 20px;">
                                <i class="fa {{ $statusIcon }}"></i>
                            </div>
                            <div>
                                <p style="font-weight: 700; color: {{ $statusColor }}; margin: 0 0 5px 0; font-size: 16px;">
                                    {{ $statusLabel }}</p>
                                <p style="color: #666; font-size: 13px; margin: 0; line-height: 1.5;">{{ $statusDesc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection