@extends('shop.layouts.main')

@section('content')

<style>
/* ===== LAYOUT ===== */

.product-detail{
    display:flex;
    gap:30px;
    margin-top:20px;
    margin-bottom:40px;
    align-items:flex-start;
}

.product-left{
    flex:1.3;
}

.product-right{
    flex:1;
    background:#fff;
    padding:16px;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

/* ===== IMAGE ===== */

.product-image img{
    width:100%;
    border-radius:12px;
}

/* ===== TITLE ===== */

.product-title{
    font-size:22px;
    font-weight:700;
    margin-bottom:6px;
}

/* ===== STATUS ===== */

.product-status{
    margin-bottom:10px;
    font-size:14px;
}

.in-stock{
    color:green;
    font-weight:bold;
}

.out-stock{
    color:#888;
}

/* ===== PRICE ===== */

.price-sale{
    font-size:25px;
    font-weight:bold;
    color:#e60023;
}

.price-old{
    color:#999;
    text-decoration:line-through;
    margin-top:5px;
}

/* ===== BUTTON ===== */

.btn-buy{
    display:block;
    width:100%;
    background:#2f80ed;
    color:#fff;
    text-align:center;
    padding:14px;
    border-radius:10px;
    margin-top:20px;
    text-decoration:none;
    font-weight:bold;
    transition:.3s;
}

.btn-buy:hover{
    opacity:.9;
    color:#fff;
}

/* ===== SPECS ===== */

.specs{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:12px;
    margin-top:20px;
}

.spec-item{
    display:flex;
    align-items:center;
    gap:10px;
    background:#f7f7f7;
    border-radius:10px;
    padding:12px;
}

.spec-icon{
    width:36px;
    height:36px;
    display:flex;
    align-items:center;
    justify-content:center;
    background:#fff;
    border-radius:10px;
}

.spec-value{
    font-size:15px;
    font-weight:600;
}

.spec-label{
    font-size:12px;
    color:#777;
}

/* ===== BREADCRUMB ===== */

.breadcrumb-custom{
    margin:20px 0;
    font-size:14px;
    color:#777;
}

.breadcrumb-custom a{
    color:#777;
    text-decoration:none;
}

.breadcrumb-custom a:hover{
    color:#2f80ed;
}



/* ===== TABS ===== */
.product-tabs{
    width:100%;
    margin-top:18px;
    margin-bottom:30px;
}

/* thanh đen full */
.tab-buttons{
    width:100%;
    background:#111;

    display:flex;
    align-items:center;

    padding:0;
}
.tab-btn{
    min-width:140px;
    height:60px;

    display:flex;
    flex-direction:row;

    align-items:center;
    justify-content:center;

    gap:8px;

    color:#fff;
    font-size:14px;
    font-weight:600;

    cursor:pointer;
    transition:.25s;

    border-right:1px solid rgba(255,255,255,0.08);
}

.tab-btn i{
    font-size:18px;
}

.tab-btn:last-child{
    border-right:none;
}

.tab-btn:hover{
    background:#1a1a1a;
}

.tab-btn.active{
    background:#000;
}
/* BỎ VIỀN CUỐI */

.tab-btn:last-child{
    border-right:none;
}

/* ACTIVE */

.tab-btn.active{
    background:#000;
}

/* HOVER */

.tab-btn:hover{
    background:#1c1c1c;
}

/* ===== REVIEW ===== */

.review-wrapper{
    width:100%;
}

.review-box{
    width:100%;
    background:#fff;
    border-radius:16px;
    padding:30px;
    box-shadow:0 5px 20px rgba(0,0,0,0.06);
}

.review-summary{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding-bottom:20px;
    border-bottom:1px solid #eee;
    margin-bottom:25px;
}

.review-average{
    font-size:32px;
    font-weight:bold;
}

.review-average span{
    color:#ffc107;
}

.review-total{
    color:#777;
}

.rating-stars{
    display:flex;
    flex-direction:row-reverse;
    justify-content:flex-end;
    margin-bottom:20px;
}

.rating-stars input{
    display:none;
}

.rating-stars label{
    font-size:38px;
    color:#ddd;
    cursor:pointer;
    transition:.2s;
    margin-right:5px;
}

.rating-stars input:checked ~ label,
.rating-stars label:hover,
.rating-stars label:hover ~ label{
    color:#ffc107;
}

.review-textarea{
    width:100%;
    min-height:130px;
    border:1px solid #ddd;
    border-radius:12px;
    padding:15px;
    resize:none;
    font-size:15px;
}

.review-submit{
    margin-top:15px;
    background:#2f80ed;
    color:#fff;
    border:none;
    padding:12px 25px;
    border-radius:10px;
    font-weight:bold;
    cursor:pointer;
}

.review-submit:hover{
    opacity:.9;
}

.review-list{
    margin-top:35px;
}

.review-item{
    border-top:1px solid #eee;
    padding:25px 0;
}

.review-user{
    font-size:16px;
    font-weight:700;
    margin-bottom:8px;
}

.review-stars{
    color:#ffc107;
    margin-bottom:10px;
    font-size:18px;
}

.review-comment{
    color:#444;
    line-height:1.7;
}

/* ===== RELATED ===== */

.related-products{
    margin-top:50px;
}

.product-card{
    width:200px;
    background:#fff;
    border-radius:12px;
    padding:12px;
    text-align:center;
    transition:.3s;
}

.product-card:hover{
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.product-card img{
    width:100%;
    border-radius:10px;
}

.product-card-name{
    margin:12px 0;
    font-weight:600;
}
.breadcrumb-custom{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
    margin:25px 0;
    padding:10px 15px;
    background:#f5f7fa;
    border-radius:10px;
}

/* link */
.breadcrumb-custom a{
    color:#555;
    text-decoration:none;
    transition:.25s;
    position:relative;
}

/* hover */
.breadcrumb-custom a:hover{
    color:#2f80ed;
}

/* dấu > */
.breadcrumb-custom span.separator{
    color:#aaa;
}

/* item cuối (active) */
.breadcrumb-custom .active{
    
    font-weight:600;
}
/* css nội thất , ngoại thất */
/* ===== CAR SLIDER (ISOLATED) ===== */

.car-slider{
    width:100%;
}

/* VIEWPORT */
.car-slider__viewport{
    position:relative;
    border-radius:12px;
    overflow:hidden;
    background:#f5f5f5;
}

.car-slider__viewport img{
    width:120%;
    height:400px;
    object-fit:cover;
    display:block;
}

/* NAV */
.car-slider__nav{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    width:42px;
    height:42px;
    border:none;
    border-radius:50%;
    background:rgba(0,0,0,0.5);
    color:#fff;
    cursor:pointer;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:18px;
    transition:.25s;
}

.car-slider__nav:hover{
    background:#2f80ed;
}

.car-slider__nav--prev{ left:12px; }
.car-slider__nav--next{ right:12px; }

/* TABS */
.car-slider__tabs{
    display:flex;
    justify-content:center;
    gap:10px;
    margin-top:12px;
}

.car-slider__tab{
    display:flex;
    align-items:center;
    gap:6px;
    padding:9px 15px;
    border:none;
    border-radius:20px;
    background:#eee;
    cursor:pointer;
    font-weight:600;
    transition:.25s;
}

.car-slider__tab.is-active{
    background:#2f80ed;
    color:#fff;
}

.car-slider__tab:hover{
    background:#dbe9ff;
}

/* RESPONSIVE */
@media(max-width:768px){
    .car-slider__viewport img{
        height:260px;
    }
}
.car-slider__dots{
    position:absolute;
    bottom:8px; /* sát viền dưới */
    left:50%;
    transform:translateX(-50%);
    display:flex;
    gap:6px;
}

.car-slider__dot{
    width:8px;
    height:8px;
    background:rgba(255,255,255,0.6);
    border-radius:50%;
    cursor:pointer;
    transition:.3s;
}

.car-slider__dot.is-active{
    background:#2f80ed;
    transform:scale(1.2);
}

</style>

<div class="container">

    <!-- BREADCRUMB -->

    <div class="breadcrumb-custom">

    <a href="{{ route('trangchu') }}">
        <i class="fa fa-home"></i> Trang chủ
    </a>

    <span class="separator">›</span>

    <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">
        {{ $category->name }}
    </a>

    <span class="separator">›</span>

    <span class="active">
        {{ $product->name }}
    </span>

</div>

    <!-- PRODUCT DETAIL -->

    <div class="product-detail">

        <!-- LEFT -->

       <div class="product-left">

    <div class="car-slider">
      
        <div class="car-slider__viewport">

            <button class="car-slider__nav car-slider__nav--prev"
                    onclick="carSlider_change(-1)">
                ❮
            </button>

            <img id="carSliderMain"
                 src="{{ asset($product->image) }}"
                 alt="{{ $product->name }}">

            <div class="car-slider__dots" id="carSliderDots"></div>

            <button class="car-slider__nav car-slider__nav--next"
                    onclick="carSlider_change(1)">
                ❯
            </button>

        </div>

        <div class="car-slider__tabs">

            <button class="car-slider__tab is-active"
                    onclick="carSlider_switch('exterior', this)">
                <i class="fas fa-car"></i>
                Ngoại thất
            </button>

            <button class="car-slider__tab"
                    onclick="carSlider_switch('interior', this)">
                <i class="fas fa-cube"></i>
                Nội thất
            </button>

        </div>

    </div>

    <!-- TAB ĐEN -->
            
      <!-- end tab -->
</div>
        <!-- RIGHT -->

        <div class="product-right">

            <div class="product-title">
                {{ $product->name }}
            </div>

            <div class="product-status">

                Tình trạng:

                @if($product->stock > 0)
                    <span class="in-stock">CÒN HÀNG</span>
                @else
                    <span class="out-stock">HẾT HÀNG</span>
                @endif

            </div>

            @if($product->sale > 0)

                <div class="price-sale">
                    {{ number_format($product->sale,0,",",".") }} đ
                </div>

                <div class="price-old">
                    {{ number_format($product->price,0,",",".") }} đ
                </div>

            @else

                <div class="price-sale">
                    {{ number_format($product->price,0,",",".") }} đ
                </div>

            @endif

            <a href="{{ route('shop.deposit', $product->id) }}"
   class="btn-buy">

    Đặt xe ngay

</a>

          @php

function getSpecIcon($name){

    return [

        'Nhiên liệu' => 'fa-gas-pump',
        'Kiểu động cơ' => 'fa-cogs',
        'Hộp số' => 'fa-gears',
        'Số chỗ ngồi' => 'fa-chair',
        'Túi khí' => 'fa-shield-halved',
        'Mức tiêu hao nhiên liệu' => 'fa-gauge-high',

    ][$name] ?? 'fa-car';

}

$showSpecs = [
    'Nhiên liệu',
    'Kiểu động cơ',
    'Hộp số',
    'Số chỗ ngồi',
    'Túi khí',
    'Mức tiêu hao nhiên liệu'
];

@endphp

<div class="specs">

    @if($product->carSpecs->count())

        @foreach($product->carSpecs as $spec)

            <div class="spec-item">

                <div class="spec-icon">

                    <i class="fa-solid {{ getSpecIcon($spec->spec_name) }}"></i>

                </div>

                <div>

                    <div class="spec-value">
                        {{ $spec->spec_value }}
                    </div>

                    <div class="spec-label">
                        {{ $spec->spec_name }}
                    </div>

                </div>

            </div>

        @endforeach

    @else

        <div class="spec-item">

            <div class="spec-icon">
                <i class="fa-solid fa-car"></i>
            </div>

            <div>

                <div class="spec-value">
                    --
                </div>

                <div class="spec-label">
                    Chưa cập nhật thông số
                </div>

            </div>

        </div>

    @endif

</div>

        </div>

    </div>

    <!-- TABS -->
<div class="product-tabs">

    <div class="tab-buttons">

        <div class="tab-btn active"
            onclick="openTab(event,'summary')">
            <i class="bi bi-card-text"></i>
            <span>Tóm Tắt</span>
        </div>

        <div class="tab-btn"
            onclick="openTab(event,'detail')">
            <i class="bi bi-file-earmark-text"></i>
            <span>Chi Tiết</span>
        </div>

        <div class="tab-btn"
            onclick="openTab(event,'review')">
            <i class="bi bi-star"></i>
            <span>Đánh Giá</span>
        </div>

        <div class="tab-btn"
            onclick="openTab(event,'compare')">

            <i class="bi bi-arrow-left-right"></i>
            <span>So Sánh</span>

        </div>

    </div>

</div>
    

        <!-- SUMMARY -->

        <div class="tab-content" id="summary">
            {!! $product->summary !!}
        </div>

        <!-- DETAIL -->

        <div class="tab-content"
             id="detail"
             style="display:none;">
           
           @php
    $cleanDescription = preg_replace('/<p>(&nbsp;|\s|<br\s*\/?>)*<\/p>/i', '', $product->description);
@endphp

<div class="product-description">
    {!! $cleanDescription !!}
</div>
            @include('shop.specs')
        </div>

        <!-- REVIEW -->

        <div class="tab-content"
             id="review"
             style="display:none;">

            <div class="review-wrapper">

                <div class="review-box">

                    @php
                        $averageRating = $product->reviews->avg('rating');
                        $totalReviews = $product->reviews->count();
                    @endphp

                    <div class="review-summary">

                        <div class="review-average">
                            <span>★</span>
                            {{ number_format($averageRating,1) }}/5
                        </div>

                        <div class="review-total">
                            {{ $totalReviews }} đánh giá
                        </div>

                    </div>

                    @auth

                    <form action="{{ route('reviews.store') }}"
                          method="POST">

                        @csrf

                        <input type="hidden"
                               name="product_id"
                               value="{{ $product->id }}">

                        <div class="rating-stars">

                            @for($i = 5; $i >= 1; $i--)

                                <input type="radio"
                                       id="star{{ $i }}"
                                       name="rating"
                                       value="{{ $i }}">

                                <label for="star{{ $i }}">★</label>

                            @endfor

                        </div>

                        <textarea name="comment"
                                  class="review-textarea"
                                  placeholder="Nhập đánh giá"></textarea>

                        <button class="review-submit">
                            Gửi đánh giá
                        </button>

                    </form>

                    @else

                    <p>
                        Vui lòng
                        <a href="{{ route('login') }}">
                            đăng nhập
                        </a>
                        để đánh giá.
                    </p>

                    @endauth

                    <div class="review-list">

                        @foreach($product->reviews->sortByDesc('id') as $review)

                            <div class="review-item">

                                <div class="review-user">
                                    {{ $review->user->name }}
                                </div>

                                <div class="review-stars">

                                    @for($i = 1; $i <= 5; $i++)

                                        @if($i <= $review->rating)
                                            ★
                                        @else
                                            ☆
                                        @endif

                                    @endfor

                                </div>

                                <div class="review-comment">
                                    {{ $review->comment }}
                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>

        </div>

    </div>
<!-- COMPARE -->

<div class="tab-content"
     id="compare"
     style="display:none;">

    @include('shop.compare')

</div>
    <!-- RELATED -->

      {{--<div class="related-products">

        <h3>Sản phẩm đã xem</h3>

        <div style="display:flex;gap:15px;flex-wrap:wrap;">

            @foreach($viewedProducts as $item)

                <div class="product-card">

                    <a href="{{ route('shop.product', ['slug'=>$item->slug,'id'=>$item->id]) }}">
                        <img src="{{ asset($item->image) }}">
                    </a>

                    <div class="product-card-name">
                        {{ $item->name }}
                    </div>

                    @if($item->sale > 0)

                        <div style="color:red;">
                            {{ number_format($item->sale,0,",",".") }} đ
                        </div>

                        <div style="text-decoration:line-through;">
                            {{ number_format($item->price,0,",",".") }} đ
                        </div>

                    @else

                        <div>
                            {{ number_format($item->price,0,",",".") }} đ
                        </div>

                    @endif

                </div>

            @endforeach

        </div>

    </div>--}}

</div>

<script>

function openTab(event, tab){

    let tabs = ['summary', 'detail', 'review', 'compare'];

    tabs.forEach(function(item){
        document.getElementById(item).style.display = 'none';
    });

    document.getElementById(tab).style.display = 'block';

    let btns = document.querySelectorAll('.tab-btn');

    btns.forEach(btn => {
        btn.classList.remove('active');
    });

    event.currentTarget.classList.add('active');
}

// ===== SLIDER =====

let carSlider_exterior = [
    @foreach($product->exteriorImages as $img)
        "{{ asset($img->image) }}",
    @endforeach
];

let carSlider_interior = [
    @foreach($product->interiorImages as $img)
        "{{ asset($img->image) }}",
    @endforeach
];

let carSlider_type = 'exterior';
let carSlider_index = 0;

function carSlider_get(){
    return carSlider_type === 'exterior'
        ? carSlider_exterior
        : carSlider_interior;
}

function carSlider_show(){
    let imgs = carSlider_get();

    if(imgs.length){
        document.getElementById('carSliderMain').src = imgs[carSlider_index];
    }

    carSlider_renderDots();  // 🔥 update dot
}

function carSlider_change(step){
    let imgs = carSlider_get();
    if(!imgs.length) return;

    carSlider_index += step;

    if(carSlider_index >= imgs.length) carSlider_index = 0;
    if(carSlider_index < 0) carSlider_index = imgs.length - 1;

    carSlider_show();
}

function carSlider_switch(type, el){
    carSlider_type = type;
    carSlider_index = 0;

    carSlider_show();

    document.querySelectorAll('.car-slider__tab').forEach(btn=>{
        btn.classList.remove('is-active');
    });

    el.classList.add('is-active');
}

function carSlider_go(index){
    carSlider_index = index;
    carSlider_show();
}

function carSlider_renderDots(){
    let dotsContainer = document.getElementById('carSliderDots');
    let imgs = carSlider_get();

    dotsContainer.innerHTML = '';

    imgs.forEach((img, index) => {
        let dot = document.createElement('span');
        dot.className = 'car-slider__dot' + (index === carSlider_index ? ' is-active' : '');

        dot.onclick = function(){
            carSlider_go(index);
        };

        dotsContainer.appendChild(dot);
    });
}

// INIT
carSlider_show();

</script>

@endsection