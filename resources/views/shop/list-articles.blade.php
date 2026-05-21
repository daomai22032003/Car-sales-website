@extends('shop.layouts.main')

@section('content')

<style>

    .list-view-content .product-datails p{
        border-bottom:0;
    }

    .breadcrumb-box{
        background:#f5f5f5;
        padding:12px 18px;
        border-radius:4px;
        font-size:14px;
        color:#666;
        margin-bottom:30px;
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

    .news-item{
        background:#fff;
        border-radius:10px;
        overflow:hidden;
        margin-bottom:30px;
        box-shadow:0 2px 12px rgba(0,0,0,0.05);
        transition:0.3s;
        padding:20px;
    }

    

    .news-image img{
        width:100%;
        height:220px;
        object-fit:cover;
        border-radius:8px;
    }

    .news-title{
        font-size:24px;
        font-weight:700;
        margin-bottom:12px;
        line-height:1.5;
    }

    .news-title a{
        color:#111;
        text-decoration:none;
    }

    .news-title a:hover{
        color:#d70018;
    }

    .news-date{
        color:#888;
        font-size:14px;
        margin-bottom:15px;
    }

    .news-summary{
        font-size:15px;
        color:#555;
        line-height:1.8;
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

            <strong class="active">
                Tin tức
            </strong>

        </div>

        <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                @foreach($articles as $article)

                    <div class="news-item">

                        <div class="row">

                            <!-- IMAGE -->
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                <div class="news-image">

                                    <a href="{{ route('shop.article.detail', ['slug' => $article->slug , 'id' => $article->id]) }}">

                                        <img src="{{ asset($article->image) }}">

                                    </a>

                                </div>

                            </div>

                            <!-- CONTENT -->
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                                <div class="news-title">

                                    <a href="{{ route('shop.article.detail', ['slug' => $article->slug , 'id' => $article->id]) }}">

                                        {{ $article->title }}

                                    </a>

                                </div>

                                <div class="news-date">

                                    <i class="fa fa-calendar"></i>

                                    {{ $article->created_at }}

                                </div>

                                <div class="news-summary">

                                    {!! $article->summary !!}

                                </div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </div>

</section>

@endsection