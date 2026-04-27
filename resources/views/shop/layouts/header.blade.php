<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <span><i class="fa fa-envelope"></i> hotro@dailyxe.com.vn</span>
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
                    <img src="{{ asset('images/logo.jpg') }}" alt="DailyXe"
                        style="height: 55px; margin-top: -5px;">
                </a>
            </div>
            <div class="col-lg-7 col-md-7 hidden-sm hidden-xs">
                <nav class="nav-menu">
                    <ul>
                        <li><a href="#">SHOWROOM <i class="fa fa-angle-down"></i></a></li>
                            <li class="menu-item mega-parent">
                                <a href="#">TÌM XE <i class="fa fa-angle-down"></i></a>

                                <div class="mega-menu">
                                    <div class="mega-title">DANH MỤC XE</div>

                                    <div class="mega-grid">
                                        @foreach($categories as $cat)
                                            <a href="{{ route('shop.category', $cat->slug) }}" class="mega-item">
                                                {{ $cat->name }}
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        <li><a href="{{ route('shop.article') }}">TIN TỨC </li>
                        <li><a href="">LIÊN HỆ </a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-8 col-xs-6 text-right">
                <i class="fa fa-search" style="margin-right: 18px; cursor: pointer; font-size: 18px; color: #555;"></i>
                <a href="{{ route('shop.cart') }}"
                    style="position: relative; display: inline-block; margin-right: 18px; text-decoration: none; color: #555;">
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
                <a href="#" class="btn-quote hidden-xs">Báo giá Xe</a>
            </div>
        </div>
    </div>
</header>
