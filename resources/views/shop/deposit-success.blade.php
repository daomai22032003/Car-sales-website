@extends('shop.layouts.main')

@section('content')
    <div class="container text-center" style="padding: 100px 0;">
        <h1>Đặt Cọc Thành Công!</h1>
        <p>Mã đơn hàng của bạn: {{ request('order_code') }}</p>
        <a href="/" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
@endsection