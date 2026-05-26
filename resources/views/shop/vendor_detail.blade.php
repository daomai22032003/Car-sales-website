@extends('shop.layouts.main')

@section('content')

<!-- 👇 FIX KHOẢNG CÁCH TRÊN -->
<div style="height:20px;"></div>

<div class="container showroom-wrapper">

    <!-- BREADCRUMB -->
<div class="breadcrumb-box mb-3">
    <a href="/">
        <i class="fa fa-home"></i> Trang chủ
    </a>

    <span class="divider">›</span>

    <a href="">
        Showroom
    </a>

    <span class="divider">›</span>

    <strong class="active">
    {{ $vendor->name }}
</strong>
</div>

<style>
    .breadcrumb-box .active{
    color:#222;
    font-weight:700;
}
.breadcrumb-box{
    background:#f5f5f5;
    padding:10px 18px;
    border-radius:4px;
    font-size:14px;
    color:#666;
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
    color:#333;
    font-weight:500;
}

.breadcrumb-box i{
    margin-right:4px;
}
</style>
   

    <!-- SHOWROOM -->
    <div class="row" style="margin-top:20px;">

        <!-- ẢNH -->
        <div class="col-md-6 mb-4">
            <div style="position: relative;">
                <img src="{{ asset($vendor->image) }}" 
                     style="width:100%; height:350px; object-fit:cover; border-radius:12px;">

                <!-- Badge -->
                <span style="
                    position:absolute;
                    top:15px;
                    left:0;
                    background:#ffc107;
                    padding:6px 12px;
                    font-weight:600;
                    border-radius:0 6px 6px 0;">
                    Độc quyền
                </span>
            </div>
        </div>

        <!-- THÔNG TIN -->
        <div class="col-md-6 mb-4">

            <h2 style="font-weight:700; margin-bottom:15px;">
                {{ $vendor->name }}
            </h2>

            <!-- Manager -->
            <div style="display:flex; align-items:center; margin-bottom:15px;">
                @if($vendor->manager_avatar)
                    <img src="{{ asset($vendor->manager_avatar) }}"
                         style="width:50px; height:50px; border-radius:50%; margin-right:10px; object-fit:cover;">
                @endif

                <div>
                    <strong>{{ $vendor->manager_name }}</strong><br>
                    <small style="color:#777;">TPKD</small>
                </div>
            </div>

            <!-- Phone -->
            <div style="margin-bottom:10px;">
                📞 <strong>{{ $vendor->phone }}</strong>
            </div>

            <!-- Address -->
            <div style="margin-bottom:10px;">
                📍 {{ $vendor->address }}
                @if($vendor->map_url)
                    <br>
                    <a href="{{ $vendor->map_url }}" target="_blank" style="color:#007bff;">
                        Xem bản đồ
                    </a>
                @endif
            </div>

            <!-- Time -->
            <div style="margin-bottom:10px;">
                🕒 {{ $vendor->open_time }}
            </div>

            <!-- Email -->
            @if($vendor->email)
            <div style="margin-bottom:10px;">
                ✉ {{ $vendor->email }}
            </div>
            @endif
            <div style="margin-bottom:10px;">
                @if($vendor->description)
                    <div style="
                        margin-top:20px;
                        padding-top:15px;
                        border-top:1px solid #eee;
                    ">
                        <h5 style="
                            font-weight:700;
                            margin-bottom:10px;
                            font-size:18px;
                        ">
                            Giới thiệu showroom
                        </h5>

                        <p style="
                            color:#555;
                            line-height:1.8;
                            margin-bottom:0;
                        ">
                            {{ $vendor->description }}
                        </p>
                    </div>
                    @endif
                 </div>
        </div>
              
    </div>

</div>

<!-- 👇 FIX KHOẢNG CÁCH DƯỚI -->
<div style="height:40px;"></div>

@endsection