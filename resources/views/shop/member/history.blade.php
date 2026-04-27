@extends('shop.layouts.main')

@section('content')
    <section class="member-history-section" style="padding: 60px 0; background: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="member-sidebar"
                        style="background: white; border-radius: 12px; padding: 25px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                        <h4
                            style="font-weight: 800; color: #1a2a5a; margin-bottom: 25px; font-size: 18px; border-bottom: 1px solid #f0f0f0; padding-bottom: 15px;">
                            Tài khoản của tôi</h4>
                        <ul style="list-style: none; padding: 0;">
                            <li style="margin-bottom: 15px;">
                                <a href="{{ route('member.order.history') }}"
                                    style="color: #1e88e5; font-weight: 700; text-decoration: none; display: flex; align-items: center;">
                                    <i class="fa fa-history" style="width: 25px; font-size: 18px;"></i> Lịch sử đơn hàng
                                </a>
                            </li>
                            <li style="margin-bottom: 15px;">
                                <a href="{{ route('member.profile') }}"
                                    style="color: #666; text-decoration: none; display: flex; align-items: center;">
                                    <i class="fa fa-user-circle-o" style="width: 25px; font-size: 18px;"></i> Thông tin cá
                                    nhân
                                </a>
                            </li>
                            <li style="margin-bottom: 15px;">
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    style="color: #d32f2f; text-decoration: none; display: flex; align-items: center;">
                                    <i class="fa fa-sign-out" style="width: 25px; font-size: 18px;"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="history-content"
                        style="background: white; border-radius: 12px; padding: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.05); border: 1px solid #f0f0f0;">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                            <h2 style="font-weight: 800; color: #1a2a5a; font-size: 24px; margin: 0;">Lịch sử đơn hàng</h2>
                            <span style="color: #666; font-size: 14px;">Bạn có {{ $orders->total() }} đơn hàng</span>
                        </div>

                        @if(count($orders) > 0)
                            <div class="table-responsive">
                                <table class="table" style="width: 100%; border-collapse: collapse;">
                                    <thead>
                                        <tr style="border-bottom: 2px solid #f0f0f0; text-align: left;">
                                            <th style="padding: 15px 10px; color: #555; font-weight: 700;">Mã đơn hàng</th>
                                            <th style="padding: 15px 10px; color: #555; font-weight: 700;">Ngày đặt</th>
                                            <th style="padding: 15px 10px; color: #555; font-weight: 700;">Tổng tiền</th>
                                            <th style="padding: 15px 10px; color: #555; font-weight: 700;">Trạng thái</th>
                                            <th style="padding: 15px 10px; color: #555; font-weight: 700;">Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $order)
                                            <tr style="border-bottom: 1px solid #f0f0f0;">
                                                <td style="padding: 20px 10px; font-weight: 600; color: #1e88e5;">
                                                    #{{ $order->code }}</td>
                                                <td style="padding: 20px 10px; color: #666;">
                                                    {{ $order->created_at->format('d/m/Y') }}
                                                </td>
                                                <td style="padding: 20px 10px; font-weight: 700; color: #b02a2a;">
                                                    {{ number_format($order->total, 0, ',', '.') }}đ
                                                </td>
                                                <td style="padding: 20px 10px;">
                                                    @php
                                                        $statusLabel = 'Mới';
                                                        $statusColor = '#2196f3';
                                                        if ($order->order_status_id == 2) {
                                                            $statusLabel = 'Đang xử lý';
                                                            $statusColor = '#ff9800';
                                                        } elseif ($order->order_status_id == 3) {
                                                            $statusLabel = 'Hoàn thành';
                                                            $statusColor = '#4caf50';
                                                        } elseif ($order->order_status_id == 4) {
                                                            $statusLabel = 'Đã hủy';
                                                            $statusColor = '#f44336';
                                                        }
                                                    @endphp
                                                    <span
                                                        style="background: {{ $statusColor }}; color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">{{ $statusLabel }}</span>
                                                </td>
                                                <td style="padding: 20px 10px;">
                                                    <a href="{{ route('member.order.detail', $order->id) }}"
                                                        style="color: #1e88e5; font-weight: 700; text-decoration: none;">Xem chi
                                                        tiết</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="margin-top: 30px;">
                                {{ $orders->links() }}
                            </div>
                        @else
                            <div style="text-align: center; padding: 60px 0;">
                                <i class="fa fa-shopping-bag" style="font-size: 64px; color: #eee; margin-bottom: 20px;"></i>
                                <p style="color: #999; font-size: 16px;">Bạn chưa có đơn hàng nào.</p>
                                <a href="/" class="btn btn-primary"
                                    style="background: #1e88e5; border: none; padding: 10px 30px; border-radius: 8px; margin-top: 20px; color: white; text-decoration: none; font-weight: 700; display: inline-block;">Mua
                                    sắm ngay</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection