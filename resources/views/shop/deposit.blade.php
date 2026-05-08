@extends('shop.layouts.main')

@section('content')

<style>

.deposit-layout{
    display:flex;
    gap:30px;
    padding:40px;
    background:#f5f5f5;
    height:100vh; /* QUAN TRỌNG */
    overflow:hidden; /* chặn scroll toàn trang */
}

/* LEFT */
.car-preview{
    width:70%;
    background:#fff;
    border-radius:20px;
    padding:25px;
    height:100%;
    overflow:hidden; /* không cho kéo */
}

.car-image-box{
    text-align:center;
    margin-bottom:30px;
}

.main-car-image{
    width:100%;
    max-width:650px;
}

.car-specs{
    display:flex;
    justify-content:center;
    gap:30px;
}

.spec-item h3{
    font-size:20px;
    margin-bottom:5px;
}

.spec-item p{
    font-size:12px;
    color:#777;
}

/* RIGHT */
.car-config{
     width:30%;
    background:#fff;
    border-radius:20px;
    padding:25px;
    height:100%;
    overflow-y:auto; /* SCROLL Ở ĐÂY */
}

/* STEP */
.step-box{
    display:flex;
    justify-content:space-between;
    margin-bottom:25px;
    border-bottom:1px solid #eee;
    padding-bottom:15px;
}

.step-item{
    display:flex;
    align-items:center;
    gap:6px;
    font-size:13px;
    cursor:pointer;
    color:#999;
}

.step-number{
    width:24px;
    height:24px;
    border-radius:50%;
    background:#ddd;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:12px;
}

.step-item.active{
    color:#1565c0;
    font-weight:bold;
}

.step-item.active .step-number{
    background:#1565c0;
}

.step-item:hover{
    color:#1565c0;
}

/* CONTENT */
.config-text{
    font-size:13px;
    margin-bottom:20px;
}

.config-group{
    margin-bottom:20px;
}

.config-title-row{
    display:flex;
    justify-content:space-between;
}

.color-list{
    display:flex;
    gap:10px;
    margin-top:10px;
}

.color-item{
    width:40px;
    height:40px;
    border-radius:50%;
    cursor:pointer;
}

.price-box{
    margin-top:25px;
}

.price-value{
    font-size:22px;
    font-weight:bold;
}

/* FORM */
.deposit-input{
    width:100%;
    height:46px;
    border:1px solid #ddd;
    border-radius:10px;
    padding:10px;
    margin-bottom:12px;
}

textarea.deposit-input{
    height:auto;
}

/* BUTTON */
.deposit-btn{
    width:100%;
    height:46px;
    background:#1565c0;
    color:#fff;
    border:none;
    border-radius:10px;
    font-size:15px;
    margin-top:10px;
}

.form-title{
    font-size:18px;
    margin-bottom:15px;
}

.error{
    color:red;
    font-size:13px;
    margin-bottom:10px;
}
.owner-type-group{
    display:flex;
    gap:20px;
    margin-top:10px;
}

.owner-option{
    display:flex;
    align-items:center;
    gap:6px;
    font-size:14px;
    cursor:pointer;
}

.owner-option input[type="radio"]{
    width:16px;
    height:16px;
    accent-color:#1565c0; /* màu xanh */
    cursor:pointer;
}
.owner-type-group{
    display:flex;
    gap:20px;
    margin-top:10px;
}

.owner-option{
    display:flex;
    align-items:center;
    gap:6px;
    font-size:14px;
    cursor:pointer;
}

.owner-option input[type="radio"]{
    width:16px;
    height:16px;
    accent-color:#1565c0; /* màu xanh */
    cursor:pointer;
}
.payment-group{
    display:flex;
    flex-direction:column;
    gap:10px;
    margin-top:10px;
}

.payment-option{
    display:flex;
    align-items:center;
    gap:8px;
    font-size:14px;
    cursor:pointer;
}

.payment-option input{
    width:16px;
    height:16px;
    accent-color:#1565c0;
}
</style>

<section class="deposit-layout">

<!-- LEFT -->
<div class="car-preview">
    <div class="car-image-box">
        <img src="{{ asset('images/logoshopdaomai.png') }}" class="main-car-image">
    </div>

    <div class="car-specs">
        <div class="spec-item">
            <h3>150 kW</h3>
            <p>Công suất</p>
        </div>
        <div class="spec-item">
            <h3>450 km</h3>
            <p>Quãng đường</p>
        </div>
        <div class="spec-item">
            <h3>2.840 mm</h3>
            <p>Chiều dài</p>
        </div>
    </div>
</div>

<!-- RIGHT -->
<div class="car-config">

<!-- STEP -->
<div class="step-box">
    <div class="step-item active" id="step-1-btn">
        <div class="step-number">1</div>
        <span>Chọn xe</span>
    </div>

    <div class="step-item" id="step-2-btn">
        <div class="step-number">2</div>
        <span>Thông tin</span>
    </div>

    <div class="step-item" id="step-3-btn">
        <div class="step-number">3</div>
        <span>Đặt cọc</span>
    </div>
</div>

<!-- STEP 1 -->

<div id="step-1-content" class="step-content">

    <p class="config-text">
        Xin mời Quý khách vui lòng chọn phiên bản, nội thất và ngoại thất xe.
    </p>

    <!-- NGOẠI THẤT -->
    <div class="config-group">

        <div class="config-title-row">
            <h4>Ngoại thất</h4>
            <span id="selected-exterior">Jet Black</span>
        </div>

        <p style="font-size:13px;color:#777;">Màu cơ bản - Theo xe</p>

        <div class="color-list">

            <div class="color-item exterior-item active"
                 data-name="Infinity Blanc"
                 style="background:#f5f5f5"></div>

            <div class="color-item exterior-item"
                 data-name="Jet Black"
                 style="background:#111"></div>

            <div class="color-item exterior-item"
                 data-name="Zenith Grey"
                 style="background:#999"></div>

            <div class="color-item exterior-item"
                 data-name="Solar Ruby"
                 style="background:#b71c1c"></div>

        </div>

        <p style="font-size:13px;color:#777; margin-top:10px;">
            Màu nâng cao + 10.000.000 VNĐ
        </p>

        <div class="color-list">

            <div class="color-item exterior-item"
                 data-name="Moonlit Ocean"
                 data-price="10000000"
                 style="background:#1565c0"></div>

            <div class="color-item exterior-item"
                 data-name="Introspective Brown"
                 data-price="10000000"
                 style="background:#5d4037"></div>

        </div>

    </div>

    <!-- NỘI THẤT -->
    <div class="config-group">

        <div class="config-title-row">
            <h4>Nội thất</h4>
            <span id="selected-interior">Black</span>
        </div>

        <div class="color-list">

            <div class="color-item interior-item active"
                 data-name="Black"
                 style="background:#111"></div>

            <div class="color-item interior-item"
                 data-name="Mocca Brown"
                 style="background:#8b5a2b"></div>

        </div>

    </div>

    <!-- PRICE -->
    <div class="price-box">
        <div class="price-label">Giá xe</div>
        <div class="price-value" id="car-price">
            529.000.000 VNĐ
        </div>
    </div>

    <button class="deposit-btn" id="to-step-2">
        BƯỚC TIẾP THEO
    </button>

</div>

<!-- STEP 2 -->
<div id="step-2-content" class="step-content" style="display:none">

    <h3 class="form-title">Thông tin chủ xe</h3>

    <!-- LOẠI KHÁCH -->
    <div class="config-group">
    <label>Chủ sở hữu xe là</label>

    <div class="owner-type-group">

        <label class="owner-option">
            <input type="radio" name="owner_type" value="canhan" checked>
            <span>Cá nhân</span>
        </label>

        <label class="owner-option">
            <input type="radio" name="owner_type" value="doanhnghiep">
            <span>Doanh nghiệp</span>
        </label>

    </div>
</div>

    <!-- HỌ TÊN -->
    <input type="text" id="name" class="deposit-input" maxlength="80" placeholder="Họ và tên">
    <!-- SĐT -->
    <input type="text" id="phone" class="deposit-input" placeholder="Số điện thoại">

    <!-- CCCD -->
    <input type="text" id="cccd" class="deposit-input" placeholder="Số CCCD">

    <!-- EMAIL -->
    <input type="email" id="email" class="deposit-input" placeholder="Email">

    <!-- TỈNH -->
      <label>Showroom nhận xe</label>
    <select id="province" class="deposit-input">
        <option value="">Chọn tỉnh thành</option>
        <option>Hà Nội</option>
        <option>TP HCM</option>
    </select>

    <!-- SHOWROOM -->
    <select id="showroom" class="deposit-input">
        <option value="">Chọn showroom</option>
        <option>VinFast Mỹ Đình</option>
        <option>VinFast Quận 7</option>
    </select>

    <!-- TƯ VẤN -->
    <select id="sale" class="deposit-input">
        <option value="">Tư vấn bán hàng</option>
        <option>Nguyễn Văn A</option>
        <option>Trần Văn B</option>
    </select>

    <!-- GIÁ XE -->
    <div class="price-box">
        <div class="price-label">Giá xe </div>
        <div class="price-value" id="step2-price">
            <!-- JS sẽ gán -->
        </div>
    </div>

    <button class="deposit-btn" id="to-step-3">
        BƯỚC TIẾP THEO
    </button>

</div>

<!-- STEP 3 -->
<!-- STEP 3 -->
<div id="step-3-content" class="step-content" style="display:none">

    <h3 class="form-title">Thông tin đơn hàng</h3>

    <!-- THÔNG TIN XE -->
    <div class="config-group">
        <h4>Thông tin xe</h4>

        <p id="car-name">VF MPV 7</p>
        <p id="car-version">Tiêu chuẩn</p>
        <p id="final-price">819.000.000 VNĐ</p>
        <p>Kèm pin</p>

        <p><b>Ngoại thất:</b> <span id="final-exterior"></span></p>
        <p><b>Nội thất:</b> <span id="final-interior"></span></p>
    </div>

    <!-- THÔNG TIN CHỦ XE -->
    <div class="config-group">
        <b>Thông tin chủ xe</b>

        <p id="final-name">Chủ xe:</p>
        <p id="final-email">Email:</p>
        <p id="final-phone">Số điện thoại:</p>
        <p id="final-cccd">Số CCCD:</p>

        <b id="final-showroom">Showroom nhận xe:</b>
        <p id="final-sale">Nhân viên tư vấn:</p>
    </div>

    <!-- THANH TOÁN -->
    <div class="config-group">
        <h4>Hình thức thanh toán</h4>

        <div class="payment-group">

            
         <b>Thanh toán VNPay</b>
          

            

        </div>

    </div>

    <button class="deposit-btn">
        XÁC NHẬN ĐẶT CỌC
    </button>

</div>
</div>
</section>

@endsection

@section('my_javascript')

<script>

$(function(){

    function goStep(step){
        $(".step-content").hide();
        $("#step-"+step+"-content").show();

        $(".step-item").removeClass("active");
        $("#step-"+step+"-btn").addClass("active");
    }

    $("#to-step-2").click(function(){
        goStep(2);
    });

    $("#to-step-3").click(function(){

        let name = $("#name").val();
        let phone = $("#phone").val();
        let email = $("#email").val();

        if(name=="" || phone=="" || email==""){
            $("#error-msg").show();
            return;
        }

        $("#error-msg").hide();

        $("#show-name").text("Tên: "+name);
        $("#show-phone").text("SĐT: "+phone);
        $("#show-email").text("Email: "+email);

        goStep(3);
    });

    $("#step-1-btn").click(()=>goStep(1));
    $("#step-2-btn").click(()=>goStep(2));
    $("#step-3-btn").click(()=>goStep(3));

});

// chọn cá nhân / doanh nghiệp
$(document).on("click", ".owner-type", function(){
    $(".owner-type").removeClass("active")
        .css("background","#eee").css("color","#000");

    $(this).addClass("active")
        .css("background","#1565c0").css("color","#fff");
});


// đếm ký tự tên
$("#name").on("input", function(){
    let length = $(this).val().length;
    $("#name-count").text(length + " / 80");
});


// khi sang step 2 -> cập nhật giá
$("#to-step-2").click(function(){

    let price = $("#car-price").text();

    $("#step2-price").text(price);
});


// validate + sang step 3
$("#to-step-3").click(function(){

    let name = $("#name").val();
    let phone = $("#phone").val();
    let email = $("#email").val();

    if(name=="" || phone=="" || email==""){
        alert("Vui lòng nhập đầy đủ thông tin");
        return;
    }

    goStep(3);
});
</script>

@endsection