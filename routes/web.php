<?php

// Trang chủ
Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('trangchu');

Route::get('/lien-he', [App\Http\Controllers\ShopController::class, 'contact'])->name('shop.contact');
Route::post('/lien-he', [App\Http\Controllers\ShopController::class, 'contactStore'])->name('shop.contactStore');
Route::get('/tra-cuu-don-hang', [App\Http\Controllers\ShopController::class, 'orderHistory'])->name('shop.orderHistory');
Route::post('/tra-cuu-don-hang', [App\Http\Controllers\ShopController::class, 'searchOrder'])->name('shop.search.order');

// Danh mục
Route::get('/danh-muc/{slug}', [App\Http\Controllers\ShopController::class, 'getProductsByCategory'])->name('shop.category');

// Chi tiet sản phẩn
Route::get('/chi-tiet-san-pham/{slug}_{id}', [App\Http\Controllers\ShopController::class, 'getProduct'])->name('shop.product');
// Tim kiem san pham , tin tuc
Route::get('/tim-kiem', [App\Http\Controllers\ShopController::class, 'search'])->name('shop.search');

Route::get('/tin-tuc', [App\Http\Controllers\ShopController::class, 'getListArticles'])->name('shop.article');

// Chi tiet tin tuc
Route::get('/chi-tiet-tin-tuc/{slug}_{id}', [App\Http\Controllers\ShopController::class, 'getArticle'])->name('shop.article.detail');

// Gio hang
Route::get('/dat-hang', [App\Http\Controllers\CartController::class, 'index'])->name('shop.cart');

// Thêm sản phẩm vào giỏ hàng
Route::get('/dat-hang/them-sp-vao-gio-hang/{id}', [App\Http\Controllers\CartController::class, 'addToCart'])->name('shop.cart.add-to-cart');

// Xóa SP khỏi giỏ hàng
Route::get('/dat-hang/xoa-sp-gio-hang/{id}', [App\Http\Controllers\CartController::class, 'removeToCart'])->name('shop.cart.remove-to-cart');

// Cập nhật giỏ hàng
Route::get('/dat-hang/cap-nhat-gio-hang', [App\Http\Controllers\CartController::class, 'updateToCart'])->name('shop.cart.update-to-cart');

// Áp dụng giảm giá
Route::get('/dat-hang/ma-giam-gia', [App\Http\Controllers\CartController::class, 'checkCoupon'])->name('shop.cart.check-coupon');

// Hủy đơn hàng
Route::get('/dat-hang/huy-don-hang', [App\Http\Controllers\CartController::class, 'destroy'])->name('shop.cart.destroy');

// Thanh toán
Route::get('/thanh-toan', [App\Http\Controllers\CartController::class, 'checkout'])->name('shop.cart.checkout');

Route::post('/thanh-toan', [App\Http\Controllers\CartController::class, 'postCheckout'])->name('shop.cart.checkout');
Route::post('/vnpay', [App\Http\Controllers\CartController::class, 'vnpay'])->name('shop.cart.vnpay');
Route::get('/vnpay_done', [App\Http\Controllers\CartController::class, 'vnpayDone'])->name('shop.cart.vnpay_done');
Route::get('/dat-coc-thanh-cong', [App\Http\Controllers\CartController::class, 'depositSuccess'])->name('shop.cart.deposit_success');



// Liên Hệ
Route::resource('contact', App\Http\Controllers\ContactController::class);

// Đăng nhập
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
// Đăng xuất
Route::get('/admin/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');

Route::post('/admin/postLogin', [App\Http\Controllers\AdminController::class, 'postLogin'])->name('admin.postLogin');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'checkLogin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::resource('category', App\Http\Controllers\CategoryController::class);
    // Quản lý kho
    Route::get('product/inventory', [App\Http\Controllers\ProductController::class, 'inventory'])->name('product.inventory');
    Route::post('product/update-stock', [App\Http\Controllers\ProductController::class, 'updateStock'])->name('product.updateStock');

    Route::resource('product', App\Http\Controllers\ProductController::class);
    // QL Banner
    Route::resource('banner', App\Http\Controllers\BannerController::class);
    // QL Thương Hiệu
    Route::resource('brand', App\Http\Controllers\BrandController::class);
    // QL Nhà Cung Cấp
    Route::resource('vendor', App\Http\Controllers\VendorController::class);
    // Ql Người dùng
    Route::resource('user', App\Http\Controllers\UserController::class);

    // Ql Đơn hàng
    Route::post('order/remove-to-cart', [App\Http\Controllers\OrderController::class, 'removeToCart'])->name('order.remove');

    Route::resource('order', App\Http\Controllers\OrderController::class);
    // QL bài viết
    Route::resource('article', App\Http\Controllers\ArticleController::class);
    // Cau Hinh Website
    Route::resource('setting', App\Http\Controllers\SettingController::class);
    // dashboard
    Route::get('dashboard/show-char', [App\Http\Controllers\AdminController::class, 'showChar'])->name('dashboard.showChar');
    Route::post('dashboard/filter', [App\Http\Controllers\AdminController::class, 'filterChar'])->name('dashboard.filterChar');



    // Thống kê
    Route::get('statistical', [App\Http\Controllers\AdminController::class, 'statistical'])->name('statistical.index');
});

// Authentication Routes
Route::get('/dang-nhap', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/dang-nhap', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/dang-ky', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/dang-ky', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::post('/dang-xuat', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Member Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/lich-su-don-hang', [App\Http\Controllers\MemberOrderController::class, 'history'])->name('member.order.history');
    Route::get('/chi-tiet-don-hang/{id}', [App\Http\Controllers\MemberOrderController::class, 'detail'])->name('member.order.detail');
    Route::get('/thong-tin-ca-nhan', [App\Http\Controllers\MemberOrderController::class, 'profile'])->name('member.profile');
    Route::post('/thong-tin-ca-nhan', [App\Http\Controllers\MemberOrderController::class, 'updateProfile'])->name('member.updateProfile');
});

// Auth::routes();
