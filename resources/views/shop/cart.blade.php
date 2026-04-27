@extends('shop.layouts.main')

@section('content')
    <style>
        #cart-summary tbody td.cart-product img {
            border: 0px
        }

        .returne-continue-shop .procedtocheckout {
            background: #ff4f4f none repeat scroll 0 0;
            border-radius: 4px;
            color: #fff;
            display: block;
            float: right;
            font-size: 20px;
            line-height: 42px;
            padding: 0 16px;
            transition: all 500ms ease 0s;
        }

        .contact-form label {
            display: block;
            margin: 14px 0;
        }

        .vnpay-button {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #007bff;
            /* Màu xanh của VNPAY */
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: 10px;
        }

        .vnpay-button img {
            width: 24px;
            height: 24px;
            margin-right: 10px;
        }

        .vnpay-button:hover {
            background-color: #0056b3;
            /* Màu xanh đậm hơn khi hover */
        }

        .vnpay-button:active {
            background-color: #004080;
            /* Màu khi nhấn */
            transform: scale(0.98);
            /* Hiệu ứng nhấn */
        }

        .vnpay-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.5);
        }
    </style>
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="/">Trang chủ</a>
                        <span><i class="fa fa-caret-right"></i></span>
                        <span>Giỏ Hàng</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SHOPPING-CART SUMMARY START -->
                    <h2 class="page-title">Thông tin giỏ hàng</h2>
                    <!-- SHOPPING-CART SUMMARY END -->
                </div>

                <div id="my-cart">
                    @include('shop.components.cart')
                </div>

                @if(count($products) > 0)
                    @guest
                        <div class="col-lg-12 text-center"
                            style="padding: 40px; background: #fff8f8; border-radius: 15px; border: 1px solid #ffdada; margin-top: 30px;">
                            <h4 style="color: #b02a2a; font-weight: 700; margin-bottom: 15px;">Bạn cần đăng nhập để đặt hàng</h4>
                            <p style="color: #666; margin-bottom: 25px;">Vui lòng đăng nhập hoặc đăng ký tài khoản để tiếp tục thanh
                                toán và theo dõi đơn hàng của bạn.</p>
                            <a href="{{ route('login') }}" class="btn btn-primary"
                                style="background: #1e88e5; border: none; padding: 12px 40px; border-radius: 10px; font-weight: 700;">Đăng
                                nhập ngay</a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary"
                                style="border: 2px solid #1e88e5; color: #1e88e5; padding: 10px 40px; border-radius: 10px; margin-left: 10px; font-weight: 700;">Đăng
                                ký</a>
                        </div>
                    @else
                        <!-- Thông Tin Cá Nhân -->
                        <form id="checkoutForm" method="post" action="{{ route('shop.cart.checkout') }}">
                            @csrf
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- CONTACT-US-FORM START -->
                                <div class="contact-us-form">
                                    <div class="contact-form-center">
                                        <h3 class="contact-subheading">Thông Tin Cá Nhân</h3>
                                        <!-- CONTACT-FORM START -->
                                        <div class="contact-form" id="contactForm">
                                            <div class="row">
                                                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                                    <div class="form-group primary-form-group">
                                                        <label>Họ và tên</label>
                                                        <input type="text" class="form-control input-feild" id="fullname"
                                                            name="fullname" value="{{ Auth::user()->name }}">
                                                        @if ($errors->has('fullname'))
                                                            <span class="invalid-feedback" role="alert"
                                                                style="color:red;">{{ $errors->first('fullname') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group primary-form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control input-feild" id="contactEmail"
                                                            name="email" value="{{ Auth::user()->email }}">
                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert"
                                                                style="color:red;">{{ $errors->first('email') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group primary-form-group">
                                                        <label>Số ĐT</label>
                                                        <input type="text" class="form-control input-feild" id="contactEmail"
                                                            name="phone" value="{{ Auth::user()->phone ?? '' }}">
                                                        @if ($errors->has('phone'))
                                                            <span class="invalid-feedback" role="alert"
                                                                style="color:red;">{{ $errors->first('phone') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                                                    <div class="type-of-text">
                                                        <div class="form-group primary-form-group">
                                                            <label>Địa chỉ nhận hàng</label>
                                                            <textarea style="height: auto" class="contact-text"
                                                                name="address">{{ Auth::user()->address ?? '' }}</textarea>
                                                            @if ($errors->has('address'))
                                                                <span class="invalid-feedback" role="alert"
                                                                    style="color:red;">{{ $errors->first('address') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="type-of-text">
                                                        <div class="form-group primary-form-group">
                                                            <label>Ghi chú</label>
                                                            <textarea style="height: 104px" class="contact-text"
                                                                name="note"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- CONTACT-FORM END -->
                                    </div>
                                </div>
                                <!-- CONTACT-US-FORM END -->
                            </div>
                            <div style="margin-top: 20px" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <!-- RETURNE-CONTINUE-SHOP START -->
                                <div class="row returne-continue-shop">
                                    <div class="col-lg-6">

                                        <a href="{{ route('shop.cart.destroy') }}" class="continueshoping"><i
                                                class="fa fa-chevron-left"></i>Hủy đặt hàng</a>
                                    </div>
                                    <div class="col-lg-6 text-end"
                                        style="display: flex; justify-content: flex-end; align-items: center;">
                                        <button type="button" class="vnpay-button" onclick="submitVnpayForm()" name="redirect">
                                            <img src="{{ url('images/vnpay.png') }}" alt="VNPAY" />
                                            Cọc 10% bằng VNPAY
                                        </button>
                                        <div>

                                            <button type="submit" class="procedtocheckout">Gửi đơn hàng</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    @endguest
                @endif
            </div>
        </div>
    </section>

    <script>
        function submitVnpayForm() {
            const fullname = document.getElementById('fullname').value.trim();
            const phone = document.querySelector('input[name="phone"]').value.trim();
            const email = document.querySelector('input[name="email"]').value.trim();
            const address = document.querySelector('textarea[name="address"]').value.trim();

            const errors = [];
            if (!fullname) errors.push('Họ và tên không được để trống');
            if (!phone) errors.push('Số điện thoại không được để trống');
            if (!email) errors.push('Email không được để trống');
            if (!address) errors.push('Địa chỉ nhận hàng không được để trống');

            if (errors.length > 0) {
                alert('Vui lòng điền đầy đủ thông tin:\n• ' + errors.join('\n• '));
                return;
            }

            const form = document.getElementById('checkoutForm');
            form.action = '{{ route('shop.cart.vnpay') }}';
            form.submit();
        }
    </script>
@endsection