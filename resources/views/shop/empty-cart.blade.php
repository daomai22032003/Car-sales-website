@extends('shop.layouts.main')

@section('content')

<style>
.empty-cart-wrap{
    padding:80px 20px;
    text-align:center;
}

.empty-cart-box{
    max-width:520px;
    margin:auto;

    background:#fff;

    border-radius:24px;

    padding:50px 40px;

    box-shadow:
        0 10px 35px rgba(0,0,0,.08);
}

.empty-cart-icon{
    width:110px;
    height:110px;

    margin:0 auto 25px;

    border-radius:50%;

    background:#f5f7fb;

    display:flex;
    align-items:center;
    justify-content:center;
}

.empty-cart-icon i{
    font-size:52px;
    color:#1565c0;
}

.empty-cart-title{
    font-size:30px;
    font-weight:700;

    margin-bottom:12px;

    color:#222;
}

.empty-cart-text{
    font-size:15px;
    line-height:1.7;

    color:#666;

    margin-bottom:35px;
}

.empty-cart-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;

    padding:14px 28px;

    background:#1565c0;
    color:#fff;

    border-radius:12px;

    text-decoration:none;

    font-size:15px;
    font-weight:700;

    transition:.25s ease;
}

.empty-cart-btn:hover{
    background:#0d47a1;
    color:#fff;

    transform:translateY(-2px);
}
</style>

<section class="empty-cart-wrap">

    <div class="empty-cart-box">

        <div class="empty-cart-icon">
            <i class="fa fa-shopping-cart"></i>
        </div>

        <h2 class="empty-cart-title">
            Giỏ hàng hiện đang trống
        </h2>

        <p class="empty-cart-text">
            Bạn chưa có đơn đặt cọc nào hoặc đơn hàng đã được hủy.
            Hãy quay lại trang chủ để tiếp tục chọn xe.
        </p>

        <a href="/"
           class="empty-cart-btn">

            <i class="fa fa-chevron-left"></i>

            Về trang chủ

        </a>

    </div>

</section>

<script>

localStorage.removeItem(
    "last_deposit_url"
);

</script>

@endsection