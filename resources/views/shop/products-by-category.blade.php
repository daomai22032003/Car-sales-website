@extends('shop.layouts.main')

@section('content')

<section class="shop-section">
    <div class="container">

        <!-- ===== BREADCRUMB ===== -->
        <div class="breadcrumb">
            <i class="fa fa-home"></i>
            <a href="{{ route('trangchu') }}">Trang chủ</a>
            <span>›</span>
            <span>Danh sách xe {{ $category->name }}</span>
        </div>

        <!-- ===== TITLE ===== -->
        <h2 class="title">
            Danh Sách Xe Ô tô {{ $category->name }} Tại Việt Nam
        </h2>

        <!-- ===== FILTER ===== -->
        <form method="GET" class="filter-bar">
            <select name="brand">
                <option value="">Loại xe</option>
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ request('brand') == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            <select name="seats">
                <option value="">Số chỗ</option>
                <option value="4" {{ request('seats') == 4 ? 'selected' : '' }}>4 chỗ</option>
                <option value="5" {{ request('seats') == 5 ? 'selected' : '' }}>5 chỗ</option>
                <option value="7" {{ request('seats') == 7 ? 'selected' : '' }}>7 chỗ</option>
            </select>

            <select name="gearbox">
                <option value="">Hộp số</option>
                <option value="Tự động" {{ request('gearbox') == 'Tự động' ? 'selected' : '' }}>Số tự động</option>
                <option value="Số sàn" {{ request('gearbox') == 'Số sàn' ? 'selected' : '' }}>Số sàn</option>
            </select>

            <select name="price">
                <option value="">Giá</option>
                <option value="0-500" {{ request('price') == '0-500' ? 'selected' : '' }}>Dưới 500 triệu</option>
                <option value="500-1000" {{ request('price') == '500-1000' ? 'selected' : '' }}>500tr - 1 tỷ</option>
            </select>

            <input type="text"
                   name="keyword"
                   placeholder="Nhập tên dòng xe..."
                   value="{{ request('keyword') }}">

            <button type="submit">Lọc</button>

            <a href="{{ url()->current() }}" class="btn-clear">
                ✕ Bỏ lọc
            </a>

        </form>

        <!-- ===== BRAND ===== -->
        @if(isset($branchs) && count($branchs) > 0)
        <div class="brand-grid">
            @foreach($branchs as $brand)
                <a href="?thuong-hieu={{ $brand->slug }}" class="brand-item">
                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}">
                </a>
            @endforeach
        </div>
        @endif

        <!-- ===== MODEL TAG ===== -->
        @if($products->count() > 0)
        <div class="model-tags">
            @foreach($products as $product)
                <span class="tag">{{ $product->name }}</span>
            @endforeach
        </div>
        @endif

        <!-- ===== PRODUCT LIST ===== -->
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4">
                    @include('shop.components.product-card', ['product' => $product])
                </div>
            @empty
                <!-- ❌ KHÔNG CÓ DATA -->
                <div class="col-12 text-center">
                    <div class="empty-box">
                        <h4>⚠️ Dữ liệu đang cập nhật</h4>
                        <p>Vui lòng quay lại sau hoặc thử bộ lọc khác</p>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- ===== PAGINATION ===== -->
        @if($products->hasPages())
        <div class="pagination-box">
            {{ $products->appends(request()->query())->links() }}
        </div>
        @endif

    </div>
</section>

@endsection