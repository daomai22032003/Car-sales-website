@extends('shop.layouts.main')

@section('content')

<style>
    .new-title{
        font-weight:700;
        font-size:28px;
        line-height:1.4;
        margin-bottom:15px;
        color:#111;
    }

    .breadcrumb-box{
        background:#f5f5f5;
        padding:12px 18px;
        border-radius:4px;
        font-size:14px;
        color:#666;
        margin-bottom:25px;
        margin-top:10px;
    }

    .breadcrumb-box a{
        color:#666;
        text-decoration:none;
    }

    .breadcrumb-box a:hover{
        color:#d70018;
    }

    .breadcrumb-box .divider{
        margin:0 8px;
        color:#999;
    }

    .breadcrumb-box .active{
        color:#222;
        font-weight:700;
    }

    .breadcrumb-box i{
        margin-right:4px;
    }

    .article-date{
        color:#888;
        font-size:14px;
        margin-bottom:25px;
    }

    .article-content{
        font-size:16px;
        line-height:1.8;
        color:#333;
    }

    .article-content img{
        max-width:100%;
        height:auto;
        border-radius:8px;
        margin:15px 0;
    }

    .back-home-btn{
        margin-top:30px;
        padding:10px 22px;
        border-radius:6px;
        font-weight:600;
    }
</style>

<section class="main-content-section">

    <div class="container">

        <!-- FIX KHOẢNG CÁCH -->
        <div style="height:15px;"></div>

        <!-- BREADCRUMB -->
        <div class="breadcrumb-box">

            <a href="/">
                <i class="fa fa-home"></i>
                Trang chủ
            </a>

            <span class="divider">›</span>

            <a href="/tin-tuc">
                Tin tức
            </a>

            <span class="divider">›</span>

            <strong class="active">
                Chi tiết
            </strong>

        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <!-- TITLE -->
                <h1 class="new-title">
                    {{ $article->title }}
                </h1>

                <!-- DATE -->
                <div class="article-date">
                    <i class="fa fa-calendar"></i>
                    {{ $article->created_at }}
                </div>

                <!-- CONTENT -->
                <div class="article-content">
                    {!! $article->description !!}
                </div>

                <!-- BUTTON -->
                <a href="{{ route('trangchu') }}"
                   class="btn btn-info back-home-btn">

                    <i class="fa fa-home"></i>
                    Về trang chủ

                </a>

            </div>

        </div>

    </div>

</section>

@endsection