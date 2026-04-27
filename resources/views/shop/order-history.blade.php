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
            line-height: 50px;
            padding: 0 16px;
            transition: all 500ms ease 0s;
        }

        .contact-form label {
            display: block;
            margin: 14px 0;
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
                        <span>Tra cứu mã đơn hàng</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <h2 style="border-bottom: none; margin:0" class="page-title">Nhập mã đơn hàng của bạn</h2>


                        <form action="{{ route('shop.search.order') }}" method="POST" class="search-form-cat">
                            @csrf
                            <div class="search-product form-group">
                                <input value="" style="width: 100%" type="text" class="form-control search-form"
                                    name="ma-don-hang" placeholder="Nhập mã đơn hàng" />
                                <button style="background: #61c348" class="search-button" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>


                </div>

                @if (isset($order))
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <h2 style="border-bottom: none; margin:0" class="page-title">Thông tin đơn hàng</h2>

                        <div class="card-body">
                            <p><strong>Mã đơn hàng:</strong> <span >{{ $order->code }}</span></p>
                            <p><strong>Tên khách hàng:</strong> <span >{{ $order->fullname }}</span></p>
                            <p><strong>Địa chỉ:</strong> <span >{{ $order->address }}</span></p>
                            <p><strong>Số điện thoại:</strong> <span >{{ $order->phone }}</span></p>

                            <p><strong>Trạng thái đơn hàng:</strong> <span class="badge text-dark">{{ $order->status->name }}</span>
                            </p>
                            <p><strong>Trạng thái cọc:</strong>
                                @if ($order->payment_vnpay_status == 0)
                                <span class="badge text-dark">Chưa cọc</span>
                                @elseif ($order->payment_vnpay_status == 1)
                                <span class="badge text-dark">Chờ xác nhận</span>
                                @else
                                <span class="badge text-dark">Đã cọc</span>
                                @endif

                            </p>
                            <p><strong>Ngày tạo:</strong> <span></span>{{ $order->created_at }}</p>
                            <p><strong>Tổng tiền:</strong> <span>{{ number_format($order->total, 0,0,'.') }}</span> VNĐ</p>
                        </div>
                    </div>
                    @endif




            </div>
    </section>
@endsection
