@extends('shop.layouts.main')

@section('content')
    <section class="main-content-section" style="background: white; padding: 60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb" style="background: none; padding-left: 0;">
                            <li class="breadcrumb-item"><a href="/" style="color: #1e88e5;">Trang chủ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="search-header"
                        style="margin-bottom: 40px; border-bottom: 1px solid #f0f0f0; padding-bottom: 20px;">
                        <h1 style="font-weight: 800; color: #1a2a5a; font-size: 28px;">
                            Kết quả tìm kiếm: <span style="color: #b02a2a;">"{{ $keyword }}"</span>
                        </h1>
                        <p style="color: #666; font-size: 16px;">Tìm thấy <strong>{{ $totalResult }}</strong> sản phẩm phù
                            hợp.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @if(count($products) > 0)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            @include('shop.components.product-card', ['product' => $product])
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center" style="padding: 100px 0;">
                        <i class="fa fa-search" style="font-size: 64px; color: #eee; margin-bottom: 20px;"></i>
                        <h3 style="color: #999;">Không tìm thấy sản phẩm nào!</h3>
                        <p style="color: #999;">Thử tìm kiếm với từ khóa khác hoặc thương hiệu khác.</p>
                        <a href="/" class="btn btn-primary"
                            style="margin-top: 20px; background: #2196f3; border: none; padding: 10px 30px; border-radius: 10px;">Quay
                            lại trang chủ</a>
                    </div>
                @endif
            </div>

            <div class="row" style="margin-top: 40px;">
                <div class="col-lg-12 text-center">
                    {{ $products->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection