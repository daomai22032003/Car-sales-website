@extends('shop.layouts.main')

@section('content')
    <!-- HERO SECTION START -->
    @if(count($banners) > 0)
        <div class="hero-wrapper"
            style="width: 100vw; margin-left: calc(-50vw + 50%); position: relative; left: 0; background: #fff; z-index: 1000;">
            <section class="hero-banner-container hero-slider-wrapper" style="position: relative; width: 100%;">
                
                <div class="owl-carousel my-slider">
                    @foreach($banners as $banner)
                        <div class="item">
                            <img src="{{ asset($banner->image) }}" alt="Banner" style="width: 100%; height: auto; display: block;">
                        </div>
                    @endforeach
                </div>

                <!-- Custom Navigation -->
                <div class="hero-nav">
                    <div class="hero-nav-btn prev" id="hero-prev">
                        <i class="fa fa-angle-left"></i>
                    </div>
                    <div class="hero-nav-btn next" id="hero-next">
                        <i class="fa fa-angle-right"></i>
                    </div>
                </div>

                <!-- Search filter box overlapping the bottom of the banner -->
                <div id="home-filter" class="search-container" style="position: absolute; bottom: -50px; left: 0; width: 100%; z-index: 1001;">
                    <div class="container">
                           
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-filter-box"
                                    style="background: #b02a2a; padding: 30px; border-radius: 20px; box-shadow: 0 15px 45px rgba(0,0,0,0.4);">
                                    <div class="row" style="display: flex; align-items: center; flex-wrap: wrap;">
                                        <div class="col-md-3">
                                            <div class="title-row" style="color: white;">
                                                <h2 style="font-weight: 800; margin-top: 0; font-size: 26px; line-height: 1.2;">
                                                    Bạn cần tìm xe?</h2>
                                                <p style="font-size: 15px; opacity: 0.9; margin-bottom: 0;">Chọn thông tin xe
                                                    bạn cần tìm.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <form action="{{ route('shop.search') }}" method="GET">
                                                <div class="filter-inputs"
                                                    style="display: flex; gap: 12px; margin-bottom: 12px;">
                                                    <select name="brand" class="form-control"
                                                        style="height: 54px; border-radius: 12px; border: none; font-size: 16px; flex: 1; box-shadow: none;">
                                                        <option value="">Chọn loại xe</option>
                                                        @foreach($brands as $brand)
                                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="model" class="form-control"
                                                        placeholder="Nhập dòng xe..."
                                                        style="height: 54px; border-radius: 12px; border: none; font-size: 16px; flex: 1; box-shadow: none; padding-left: 15px;">
                                                    <select name="price" class="form-control"
                                                        style="height: 54px; border-radius: 12px; border: none; font-size: 16px; flex: 1; box-shadow: none;">
                                                        <option value="">Giá</option>
                                                        <option value="400-600">400 - 600 triệu</option>
                                                        <option value="600-800">600 - 800 triệu</option>
                                                        <option value="800-1500">800 - 1.5 tỷ</option>
                                                    </select>
                                                    <button type="submit" class="btn btn-primary"
                                                        style="background: #2196f3; border: none; padding: 0 40px; border-radius: 12px; font-weight: bold; height: 54px; font-size: 17px; box-shadow: 0 4px 10px rgba(33, 150, 243, 0.3);">
                                                        <i class="fa fa-search"></i> Tìm xe
                                                    </button>
                                                </div>
                                                <div class="trending-tags"
                                                    style="color: white; font-size: 14px; display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
                                                    <span style="opacity: 0.8;">Được tìm nhiều:</span>
                                                    <span class="tag-item"
                                                        style="background: rgba(0,0,0,0.4); padding: 4px 15px; border-radius: 20px; cursor: pointer; transition: background 0.2s;">Giá
                                                        xe tháng 4</span>
                                                    <span class="tag-item"
                                                        style="background: rgba(0,0,0,0.4); padding: 4px 15px; border-radius: 20px; cursor: pointer; transition: background 0.2s;">VinFast
                                                        VF5</span>
                                                    <span class="tag-item"
                                                        style="background: rgba(0,0,0,0.4); padding: 4px 15px; border-radius: 20px; cursor: pointer; transition: background 0.2s;">Toyota
                                                        Vios</span>
                                                    <span class="tag-item"
                                                        style="background: rgba(0,0,0,0.4); padding: 4px 15px; border-radius: 20px; cursor: pointer; transition: background 0.2s;">KIA
                                                        Sportage</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endif
    <!-- HERO SECTION END -->

                <section class="main-content-section"
                    style="background: white; padding: 120px 0 60px; position: relative; z-index: 900;">
                    <div class="container">
                         @foreach ($list as $item)
                            <div class="row" style="margin-top: 40px;">
                                <div class="col-md-12">
                                    <div class="section-title"
                                        style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 35px;">
                                        
                                        <h2 style="font-weight: 800; color: #1a2a5a; text-transform: uppercase; font-size: 26px; margin: 0;">
                                            {{ $item['category']->name }}
                                        </h2>

                                    </div>
                                </div>
                            </div>

                            <div class="product-slider-wrapper">

                                @if(count($item['products']) > 4)
                                    <div class="product-nav prev" data-key="{{ $loop->index }}">
                                        <i class="fa fa-angle-left"></i>
                                    </div>
                                @endif

                                <div class="owl-carousel product-slider product-slider-{{ $loop->index }}">
                                    @foreach($item['products'] as $product)
                                        <div class="item">
                                            @include('shop.components.product-card', ['product' => $product])
                                        </div>
                                    @endforeach
                                </div>

                                @if(count($item['products']) > 4)
                                    <div class="product-nav next" data-key="{{ $loop->index }}">
                                        <i class="fa fa-angle-right"></i>
                                    </div>
                                @endif

                            </div>
                        @endforeach 
                    </div>
                </section>
@endsection

@section('my_javascript')
<script>
    $(document).ready(function(){

    // HERO SLIDER
    var owl = $(".my-slider");
    owl.owlCarousel({
        singleItem: true,
        autoPlay: 5000,
        navigation: false,
        pagination: false
    });

    $("#hero-next").click(function(){
        owl.trigger('owl.next');
    });
    $("#hero-prev").click(function(){
        owl.trigger('owl.prev');
    });

    // PRODUCT SLIDER
    $(".product-slider").each(function(){
       $(this).owlCarousel({
        items:4,
        autoPlay:false, 
        navigation: false,
        pagination: false
    });
    });

    $(".product-nav.next").click(function(){
        var key = $(this).data("key");
        $(".product-slider-" + key).trigger('owl.next');
    });

    $(".product-nav.prev").click(function(){
        var key = $(this).data("key");
        $(".product-slider-" + key).trigger('owl.prev');
    });

});
</script>
@endsection