@extends('shop.layouts.main')

@section('content')
    <style></style>
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="/">Trang chủ</a>
                        <span><i class="fa fa-caret-right"></i></span>
                        <span>{{ $category->name }}</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <!-- PRODUCT-LEFT-SIDEBAR START -->
                    <div class="product-left-sidebar">

                        <div class="product-single-sidebar">
                            <span class="sidebar-title" style="border-bottom: 0px; ">Loại xe</span>
                          <ul class="thuong-hieu">
                                <li>
                                    <label class="cheker">
                                        <input 
                                            class="filter_category" 
                                            data-text="tat-ca" 
                                            type="radio" 
                                            name="category" 
                                            value="tat-ca"
                                            {{ empty($arr_filter_brands) ? 'checked' : '' }}
                                        />
                                        <span></span>
                                    </label>
                                    <a href="javascript:void(0)">Tất cả</a>
                                </li>

                                @foreach($branchs as $child)
                                    <li>
                                        <label class="cheker">
                                            <input 
                                                class="filter_category" 
                                                data-text="{{ $child->slug }}" 
                                                type="radio" 
                                                name="category" 
                                                value="{{ $child->id }}"
                                                {{ ($arr_filter_brands == $child->slug) ? 'checked' : '' }}
                                            />
                                            <span></span>
                                        </label>
                                        <a href="javascript:void(0)">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- SINGLE SIDEBAR CATEGORIES END -->
                        <!-- SINGLE SIDEBAR AVAILABILITY START -->
                        <div class="product-single-sidebar">
                            <span class="sidebar-title" style="border-bottom: 0px">Mức giá</span>
                            <ul>
                               <li>
    <label class="cheker">
        <input {{ ($filter_price == '' ? 'checked' : '') }} class="filter-price" value="tat-ca" type="radio" name="price"/>
        <span></span>
    </label>
    <a href="javascript:void(0)">Tất cả</a>
</li>

<li>
    <label class="cheker">
        <input {{ ($filter_price == '0-500000000' ? 'checked' : '') }} class="filter-price" type="radio" name="price" value="0-500000000"/>
        <span></span>
    </label>
    <a href="#">Dưới 500 triệu</a>
</li>

<li>
    <label class="cheker">
        <input {{ ($filter_price == '300000000-400000000' ? 'checked' : '') }} class="filter-price" type="radio" name="price" value="300000000-400000000"/>
        <span></span>
    </label>
    <a href="#">300 - 400 triệu</a>
</li>

<li>
    <label class="cheker">
        <input {{ ($filter_price == '400000000-700000000' ? 'checked' : '') }} class="filter-price" type="radio" name="price" value="400000000-700000000"/>
        <span></span>
    </label>
    <a href="#">400 - 700 triệu</a>
</li>

<li>
    <label class="cheker">
        <input {{ ($filter_price == '700000000-' ? 'checked' : '') }} class="filter-price" type="radio" name="price" value="700000000-"/>
        <span></span>
    </label>
    <a href="#">Trên 700 triệu</a>
</li>
                                <!-- <li>
                                    <label class="cheker">
                                        <input {{ ($filter_price == '13000000-' ? 'checked' : '') }} class="filter-price" type="radio" name="price" value="13000000-"/>
                                        <span></span>
                                    </label>
                                    <a href="#">Trên 13 triệu
                                    </a>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                    <div class="right-all-product">
                        <!-- PRODUCT-CATEGORY-HEADER END -->
                        <div class="product-category-title">
                            <!-- PRODUCT-CATEGORY-TITLE START -->
                            <h1>
                                <span class="cat-name">{{ $category->name }}</span>
                                <div class="shoort-by" style="float: right">
                                    <label for="" style="font-size: 14px;text-transform: capitalize;font-weight: normal">Sắp sếp</label>
                                    <div class="short-select-option">
                                        <select name="sortby" id="productShort" class="filter_sort">
                                            <option value="tat-ca">-- Tất cả ---</option>
                                            <option {{ ($filter_sort == 'noi-bat' ? 'selected' : '') }} value="noi-bat">Nổi bật</option>
                                            <option {{ ($filter_sort == 'ban-chay-nhat' ? 'selected' : '') }} value="ban-chay-nhat">Bán chạy nhất</option>
                                            <option {{ ($filter_sort == 'gia-thap-den-cao' ? 'selected' : '') }} value="gia-thap-den-cao">Gía thấp đến cao</option>
                                            <option {{ ($filter_sort == 'gia-cao-den-thap' ? 'selected' : '') }} value="gia-cao-den-thap">Gía cao đến thấp</option>
                                        </select>
                                    </div>
                                </div>
                            </h1>
                            <!-- PRODUCT-CATEGORY-TITLE END -->
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT START -->
                    <div class="all-gategory-product">
                        <div class="row">
                            <ul class="gategory-product">
                                @foreach($products as $product)
                                    <li class="gategory-product-list col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <div class="single-product-item">
                                            <div class="product-image">
                                                <a href="{{ route('shop.product', ['slug' => $product->slug , 'id' => $product->id]) }}" title="{{ $product->name }}" >
                                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('shop.product', ['slug' => $product->slug , 'id' => $product->id]) }}" title="{{ $product->name }}">{{ $product->name }}</a>
                                                <div class="price-box">
                                            <div class="price-box">
                                                @if($product->sale > 0)
                                                    <span class="price" style="color:red; font-weight:bold;">
                                                        {{ number_format($product->sale,0,",",".") }} đ
                                                    </span>
                                                    <span class="p-price" style="text-decoration: line-through; color:#777;">
                                                        {{ number_format($product->price,0,",",".") }} đ
                                                    </span>
                                                @else
                                                    <span class="price" style="font-weight:bold;">
                                                        {{ number_format($product->price,0,",",".") }} đ
                                                    </span>
                                                @endif
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <!-- ALL GATEGORY-PRODUCT END -->
                    <!-- PRODUCT-SHOOTING-RESULT START -->
                    <div class="product-shooting-result product-shooting-result-border" style="border: 0px">
                        <style> </style>
                        {{ $products->links() }}
                    </div>
                    <!-- PRODUCT-SHOOTING-RESULT END -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('my_javascript')
    <script type="text/javascript">

    var pathname = window.location.pathname;
    var urlParams = new URLSearchParams(window.location.search || '');

    // ================= BRAND =================
    $(document).on('click', '.filter_category', function () {

        var isAll = $(this).data('text') === 'tat-ca';

        if (isAll) {
            // chọn tất cả → bỏ các brand khác
            $('.filter_category').prop('checked', false);
            $(this).prop('checked', true);
            urlParams.delete('thuong-hieu');
        } else {
            // chọn brand → bỏ "tất cả"
            $('.filter_category[data-text="tat-ca"]').prop('checked', false);

            var str_slug = '';

            $('.filter_category:checked').each(function() {
                var slug = $(this).data('text');
                if (slug !== 'tat-ca') {
                    str_slug += slug + ',';
                }
            });

            if (str_slug !== '') {
                str_slug = str_slug.slice(0, -1);
                urlParams.set('thuong-hieu', str_slug);
            } else {
                urlParams.delete('thuong-hieu');
            }
        }

        window.location.href = pathname + "?" + urlParams.toString();
    });

    // ================= PRICE =================
    $(document).on('click', '.filter-price', function () {

        var price = $(this).val();

        if (price === 'tat-ca') {
            urlParams.delete('gia');
        } else {
            urlParams.set('gia', price);
        }

        window.location.href = pathname + "?" + urlParams.toString();
    });

    // ================= SORT =================
    $(document).on('change', '.filter_sort', function () {

        var sort = $(this).val();

        if (sort === 'tat-ca') {
            urlParams.delete('sap-sep');
        } else {
            urlParams.set('sap-sep', sort);
        }

        window.location.href = pathname + "?" + urlParams.toString();
    });

    // ================= SET CHECKED =================
    $(document).ready(function() {

        var arr_filter_brands = {!! $arr_filter_brands !!};

        if (arr_filter_brands && arr_filter_brands.length) {

            $('.filter_category').each(function() {

                var value = parseInt($(this).val());

                $(this).prop('checked', false);

                if (arr_filter_brands.includes(value)) {
                    $(this).prop('checked', true);
                }
            });

        } else {
            // nếu không có filter → check "tất cả"
            $('.filter_category[data-text="tat-ca"]').prop('checked', true);
        }

    });

</script>
@endsection


