<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <span><i class="fa fa-envelope"></i> daomai2203@gmail.com</span>
            </div>
            <div class="col-md-6 col-sm-12 text-right top-links">
                @guest
                    <a href="{{ route('login') }}"><i class="fa fa-user-circle-o"></i> Đăng nhập</a>
                    <span style="color: rgba(255,255,255,0.3); margin: 0 10px;">|</span>
                    <a href="{{ route('register') }}">Đăng ký</a>
                @else
                    <div class="user-menu" style="display: inline-block; position: relative;">
                        <a href="#" id="user-menu-toggle" onclick="event.preventDefault(); toggleUserMenu();">
                            <i class="fa fa-user-circle-o"></i> Chào, {{ Auth::user()->name }} <i
                                class="fa fa-angle-down"></i>
                        </a>
                        <div class="user-dropdown" id="user-dropdown-menu">
                            <a href="{{ route('member.order.history') }}"><i class="fa fa-history"></i> Lịch sử mua hàng</a>
                            <a href="{{ route('member.profile') }}"><i class="fa fa-cog"></i> Cấu hình tài khoản</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                style="color: #d32f2f;"><i class="fa fa-sign-out"></i> Đăng xuất</a>
                        </div>
                    </div>
                    <script>
                        function toggleUserMenu() {
                            var menu = document.getElementById('user-dropdown-menu');
                            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
                        }
                        document.addEventListener('click', function (e) { var toggle = document.getElementById('user-menu-toggle'); var menu = document.getElementById('user-dropdown-menu'); if (menu && toggle && !toggle.contains(e.target) && !menu.contains(e.target)) { menu.style.display = 'none'; } });
                    </script>
                @endguest
            </div>
        </div>
    </div>
</div>

<header class="header-main">
    <div class="container">
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">
                <a href="/" class="logo">
                    <img src="{{ asset('images/logoshopdaomai.png') }}" alt="DailyXe"
                        style="height: 55px; margin-top: -5px;">
                </a>
            </div>
            <div class="col-lg-7 col-md-7 hidden-sm hidden-xs">
                <nav class="nav-menu">
                    <ul>
                       <li class="menu-item mega-parent">
                            <a href="#">SHOWROOM <i class="fa fa-angle-down"></i></a>

                            <div class="mega-menu">
                                <div class="mega-title">HỆ THỐNG SHOWROOM</div>

                                <div class="mega-grid">
                                    @foreach($vendors as $vendor)
                                        <a href="{{ route('vendor.detail', $vendor->slug) }}" class="mega-item">
                                            {{ $vendor->name }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </li>
                            <li class="menu-item mega-parent">
                                <a href="#">TÌM XE <i class="fa fa-angle-down"></i></a>
                                <div class="mega-menu">
                                    <div class="mega-title">THƯƠNG HIỆU XE</div>

                                    <div class="brand-grid">
                                        @foreach($categories as $cat)
                                            <a href="{{ route('shop.category', $cat->slug) }}" class="brand-item">

                                                <img src="{{ asset($cat->image) }}" alt="">

                                                <span>{{ $cat->name }}</span>

                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                
                            </li>
                      <li class="menu-item utility-parent">

    <a href="#">
        TIỆN ÍCH <i class="fa fa-angle-down"></i>
    </a>

    <ul class="utility-dropdown">

        <li>
            <a href="https://zalo.me/0378034401" target="_blank">
                Liên hệ Zalo
            </a>
        </li>

        <li>
            
        </li>

        <li>
            <a href="{{ route('shop.article') }}">
                Tin tức xe
            </a>
        </li>
        <li>
           <a href="{{ route('shop.installment') }}" >
               Dự tính trả góp
           </a>
        </li>
    </ul>

</li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-8 col-xs-6 text-right">
                <i class="fa fa-search"
   id="openSearch"
   style="margin-right: 18px; cursor: pointer; font-size: 18px; color: #555;">
</i>
                <a href="#"id="header-cart-btn"style="position: relative; display: inline-block; margin-right: 18px; text-decoration: none; color: #555;">
                    <i class="fa fa-shopping-cart" style="font-size: 22px;"></i>
                    @php
                        $totalQty = 0;
                        if (Auth::check()) {
                            $totalQty = Auth::user()->cartItems()->sum('quantity');
                        } elseif (session('cart')) {
                            $totalQty = session('cart')->totalQty;
                        }
                    @endphp
                    @if ($totalQty > 0)
                        <span
                            style="position: absolute; top: -8px; right: -8px; background: #e53935; color: white; border-radius: 50%; font-size: 11px; font-weight: 700; width: 18px; height: 18px; display: flex; align-items: center; justify-content: center; line-height: 1;">{{ $totalQty }}</span>
                    @endif
                </a>
                
            </div>
        </div>
    </div>
</header>
<!-- SEARCH OVERLAY -->

<div class="car-search-overlay" id="searchOverlay">

    <div class="car-search-box">

        <div class="close-search" id="closeSearch">
            ×
        </div>

        <h1 class="search-title">
            Bạn cần tìm gì?
        </h1>

        <form action="{{ route('car.search.result') }}" method="GET">

            <div class="search-form">

                <input type="text"
                       name="q"
                       class="search-input"
                       placeholder="Ví dụ: Toyota Vios, Kia K3..."
                       required>

               <button type="submit" class="search-btn">
    <i class="fa fa-search"></i>
    Tìm kiếm
</button>

            </div>

        </form>

        <div class="popular-search">

            <span>Được tìm nhiều:</span>

            <div class="tags">

                <a href="{{ route('car.search.result',['q'=>'VinFast VF5']) }}">
                    VinFast VF5
                </a>

                <a href="{{ route('car.search.result',['q'=>'VinFast VF8 Eco ']) }}">
                    VinFast VF8 Eco 
                </a>

                <a href="{{ route('car.search.result',['q'=>'KIA K3']) }}">
                    KIA K3
                </a>

            </div>

        </div>

    </div>

</div>
<style>
   /* =========================
   SEARCH OVERLAY
========================= */

.car-search-overlay{
    position: fixed;
    inset: 0;

    background: #f5f5f5;

    z-index: 999999;

    display: none;

    align-items: center;
    justify-content: center;

    overflow: hidden;
}

.car-search-overlay.active{
    display: flex;
}

/* =========================
   SEARCH BOX
========================= */

.car-search-box{
    width: 1200px;
    max-width: 88%;

    position: relative;

    background: #f5f5f5 !important;
}

/* =========================
   CLOSE BUTTON
========================= */

.close-search{
    position: absolute;

    top: -110px;
    right: 0;

    width: 68px;
    height: 68px;

    border-radius: 50%;

    background: #e5e5e5;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 40px;
    font-weight: 700;

    color: #222;

    cursor: pointer;

    transition: 0.3s;
}

.close-search:hover{
    background: #d8d8d8;
}

/* =========================
   TITLE
========================= */

.search-title{
    text-align: center;

    font-size: 48px;
    font-weight: 700;

    color: #0057d9;

    margin-bottom: 60px;

    line-height: 1.1;
}

/* =========================
   FORM
========================= */

.car-search-overlay form{
    background: #f5f5f5 !important;
    border: none !important;
    box-shadow: none !important;
}

.search-form{
    width: 100%;

    display: flex;
    align-items: center;

    gap: 22px;

    background: #f5f5f5 !important;

    border: none !important;
    box-shadow: none !important;
}

/* =========================
   INPUT
========================= */

.search-input{
    flex: 1;
    min-width: 0;

    height: 50px;

    border: none !important;
    border-bottom: 2px solid #777 !important;

    background: #f5f5f5 !important;

    padding: 0;

    font-size: 22px;
    font-weight: 400;

    color: #222;

    outline: none !important;
    box-shadow: none !important;

    appearance: none !important;
    -webkit-appearance: none !important;
}

.search-input:focus{
    background: #f5f5f5 !important;
    box-shadow: none !important;
}

.search-input::placeholder{
    color: #7a7a7a;
    font-size: 20px;
}

/* =========================
   BUTTON
========================= */

.search-btn{
    border: none !important;

    width: 210px;
    height: 68px;

    border-radius: 40px;

    background: #1677ff !important;
    color: #fff;

    font-size: 24px;
    font-weight: 600;

    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;

    cursor: pointer;

    transition: 0.3s;

    box-shadow: none !important;
}

.search-btn:hover{
    background: #0057d9 !important;
}

/* =========================
   POPULAR SEARCH
========================= */

.popular-search{
    margin-top: 42px;
}

.popular-search span{
    font-size: 18px;
    color: #222;
}

/* =========================
   TAGS
========================= */

.tags{
    display: flex;
    align-items: center;
    flex-wrap: wrap;

    gap: 14px;

    margin-top: 18px;
}

.tags a{
    text-decoration: none;

    background: #e5e5e5;
    color: #222;

    padding: 10px 20px;

    border-radius: 30px;

    font-size: 16px;

    transition: 0.3s;
}

.tags a:hover{
    background: #1677ff;
    color: #fff;
}

/* =========================
   REMOVE WHITE BACKGROUND
========================= */

.car-search-overlay input,
.car-search-overlay input:focus,
.car-search-overlay input:active,
.car-search-overlay form,
.car-search-overlay .search-form,
.car-search-overlay .car-search-box{
    background: #f5f5f5 !important;

    box-shadow: none !important;

    border-top: none !important;
    border-left: none !important;
    border-right: none !important;

    outline: none !important;
}

/* =========================
   MOBILE
========================= */

@media(max-width: 992px){

    .search-title{
        font-size: 52px;
    }

    .search-form{
        flex-direction: column;
        align-items: stretch;
    }

    .search-btn{
        width: 100%;
    }

}

@media(max-width: 576px){

    .search-title{
        font-size: 38px;
    }

    .search-input{
        font-size: 18px;
    }

    .search-btn{
        height: 58px;
        font-size: 20px;
    }

    .close-search{
        top: -85px;

        width: 55px;
        height: 55px;

        font-size: 32px;
    }

}
</style>
<script>

document.addEventListener(
    "DOMContentLoaded",
    function(){

        const cartBtn =
            document.getElementById(
                "header-cart-btn"
            );

        if(cartBtn){

            cartBtn.addEventListener(
                "click",
                function(e){

                    e.preventDefault();

                    let lastDeposit =
                        localStorage.getItem(
                            "last_deposit_url"
                        );

                    if(lastDeposit){

                        window.location.href =
                            lastDeposit;

                    }else{

                        window.location.href =
                             "{{ route('shop.empty.cart') }}";
                    }

                }
            );

        }

    }
);
// tìm kiếm gần giỏ hàng
document.addEventListener("DOMContentLoaded", function () {

    const openSearch =
        document.getElementById('openSearch');

    const closeSearch =
        document.getElementById('closeSearch');

    const searchOverlay =
        document.getElementById('searchOverlay');

    if(openSearch){

        openSearch.addEventListener('click', () => {

            searchOverlay.classList.add('active');

            document.body.style.overflow = 'hidden';

        });

    }

    if(closeSearch){

        closeSearch.addEventListener('click', () => {

            searchOverlay.classList.remove('active');

            document.body.style.overflow = 'auto';

        });

    }

});

</script>