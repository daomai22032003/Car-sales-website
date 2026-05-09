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
    width:100%;
    height:520px;

    display:flex;
    justify-content:center;
    align-items:center;

    overflow:hidden;
}

.main-car-image{
    display:block;
    margin:auto;

    max-width:720px;
    max-height:520px;

    object-fit:contain;

    transition:all .3s ease;
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
    cursor:pointer;
}

.form-title{
    font-size:18px;
    margin-bottom:15px;
     font-weight:700;
}

.error{
    color:red;
    font-size:13px;
    margin-bottom:10px;
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
.color-item{
    width:40px;
    height:40px;
    border-radius:50%;
    cursor:pointer;
    border:3px solid transparent;
    transition:all .25s ease;
}

.color-item:hover{
    transform:scale(1.12);
    border:3px solid #1565c0;
}

.color-item.active{
    transform:scale(1.15);
    border:3px solid #1565c0;
    box-shadow:0 0 12px rgba(21,101,192,.35);
}

.vnpay-button{
    display:flex;
    align-items:center;
    gap:10px;

    width:fit-content;

    padding:8px 14px;

    border-radius:8px;

    background:#f5f7fb;
    border:1px solid #dbe4f0;

    font-size:14px;
    font-weight:600;
    color:#1565c0;
}

.vnpay-button img{
    width:28px;
    height:28px;

    object-fit:contain;

    background:#fff;
    border-radius:4px;
    padding:2px;
}
.deposit-money{
    margin-top:10px;

    font-size:14px;
    color:#333;
}

.deposit-money b{
    color:#1565c0;
    font-size:15px;
}
.error-message{
    display:block;
    margin-top:5px;
    font-size:13px;
}

.is-invalid{
    border:1px solid #ff4d4f !important;
}
.commit-box label {
    display: block;
    margin-bottom: 10px;
    line-height: 1.5;
    cursor: pointer;
}

.commit-box input[type="checkbox"] {
    margin-right: 8px;
    transform: scale(1.1);
}

/* Khi đủ điều kiện */
/* CHỈ NÚT THANH TOÁN */
.payment-btn{
    background:#bdbdbd;
    cursor:not-allowed;
}

/* khi tick đủ 4 checkbox */
.payment-btn.deposit-active{
    background:#1565c0;
    cursor:pointer;
}

.payment-btn.deposit-active:hover{
    background:#0d47a1;
}
.cancel-order{
    margin-top:25px;
    padding-left:10px;
}

.cancel-order a{
    display:flex;
    align-items:center;
    gap:10px;

    font-size:16px;
    font-weight:600;

    color:#333;
    text-decoration:none;

    transition:.25s;
}

.cancel-order a:hover{
    color:#1565c0;
}

.cancel-order i{
    font-size:24px;
    color:#777;
}
/* thanh công cụ */

</style>

<section class="deposit-layout">

<!-- LEFT -->
<div class="car-preview">
   <img id="main-car-image"
 
@if(
    $product->colors->count() &&
    $product->colors[0]->images->count()
)

    src="{{ asset('storage/'.$product->colors[0]->images[0]->image) }}"

@else

    src="{{ asset('storage/'.$product->image) }}"

@endif

class="main-car-image">

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
    <div class="cancel-order">
    <a href="{{ route('deposit.destroy') }}">
        <i class="fa fa-angle-left"></i>
        Hủy đặt hàng
    </a>
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

    <span id="selected-exterior">

@if($product->colors->count())

    {{ $product->colors[0]->color_name }}

@else

    Đang cập nhật

@endif

</span>
</div>       
        {{-- MÀU CƠ BẢN --}}
<p style="font-size:13px;color:#777;">
    Màu cơ bản - Theo xe
</p>

<div class="color-list">

   @foreach($product->colors->where('extra_price',0) as $index => $color)

    <div class="color-item exterior-item {{ $index == 0 ? 'active' : '' }}"
     data-id="{{ $color->id }}"
         data-name="{{ $color->color_name }}"
         data-price="{{ $color->extra_price }}"
         data-image="
@if($color->images->count())
    {{ asset('storage/'.$color->images->first()->image) }}
@else
    {{ asset('storage/'.$product->image) }}
@endif
"
         style="background:{{ $color->color_code }}">
    </div>

@endforeach

</div>

{{-- MÀU NÂNG CAO --}}
@if($product->colors->where('extra_price','>',0)->count())

<p style="font-size:13px;color:#777; margin-top:15px;">
    Màu nâng cao
</p>

<div class="color-list">

   @foreach($product->colors->where('extra_price','>',0) as $color)

    <div class="color-item exterior-item"
     data-id="{{ $color->id }}"
         data-name="{{ $color->color_name }}"
         data-price="{{ $color->extra_price }}"
        data-image="
@if($color->images->count())
    {{ asset('storage/'.$color->images->first()->image) }}
@else
    {{ asset('storage/'.$product->image) }}
@endif
"
         style="background:{{ $color->color_code }}">
    </div>

@endforeach

</div>

@endif

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
        <div class="price-value" id="car-price"></div>
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
<input type="text"
       id="name"
       class="deposit-input"
       maxlength="80"
       placeholder="Họ và tên"
       value="{{ auth()->check() ? auth()->user()->name : '' }}">

<small class="text-danger error-message"
       id="name-error">
</small>


<!-- SĐT -->
<input type="text"
       id="phone"
       class="deposit-input"
       placeholder="Số điện thoại"
       value="{{ auth()->check() ? auth()->user()->phone : '' }}">

<small class="text-danger error-message"
       id="phone-error">
</small>


<!-- CCCD -->
<input type="text"
       id="cccd"
       class="deposit-input"
       placeholder="Số CCCD">

<small class="text-danger error-message"
       id="cccd-error">
</small>


<!-- EMAIL -->
<input type="email"
       id="email"
       class="deposit-input"
       placeholder="Email"
       value="{{ auth()->check() ? auth()->user()->email : '' }}">

<small class="text-danger error-message"
       id="email-error">
</small>


<!-- TỈNH -->
<label>Showroom nhận xe</label>

<select id="province"
        class="deposit-input">

    <option value="">
        Chọn tỉnh thành
    </option>

    @foreach($vendors->unique('province') as $vendor)

        <option value="{{ $vendor->province }}">
            {{ $vendor->province }}
        </option>

    @endforeach

</select>

<small class="text-danger error-message"
       id="province-error">
</small>


<!-- SHOWROOM -->
<select id="showroom"
        class="deposit-input"
        disabled>

    <option value="">
        Chọn showroom
    </option>

</select>

<small class="text-danger error-message"
       id="showroom-error">
</small>


<!-- QUẢN LÝ -->
<select id="sale"
        class="deposit-input"
        disabled>

    <option value="">
        Quản lý showroom
    </option>

</select>

<small class="text-danger error-message"
       id="sale-error">
</small>
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

<form id="vnpay-form"
      action="{{ route('deposit.vnpay') }}"
      method="POST">

    @csrf
    <input type="hidden"name="product_color_id"id="product_color_id">
    <input type="hidden" name="product_id"
           value="{{ $product->id }}">

    <input type="hidden" name="car_price"
           id="input-car-price">

    <input type="hidden" name="deposit_price"
           id="input-deposit-price">

    <input type="hidden" name="customer_name"
           id="input-name">

    <input type="hidden" name="customer_phone"
           id="input-phone">

    <input type="hidden" name="customer_email"
           id="input-email">

    <input type="hidden" name="customer_cccd"
           id="input-cccd">

    <input type="hidden" name="showroom"
           id="input-showroom">

    <input type="hidden" name="manager_name"
           id="input-manager">

    <input type="hidden" name="exterior_color"
           id="input-exterior">

    <input type="hidden" name="interior_color"
           id="input-interior">

<div id="step-3-content"
     class="step-content"
     style="display:none">

    <h3 class="form-title">
        Thông tin đơn hàng
    </h3>

    <!-- THÔNG TIN XE -->
    <div class="config-group">

        <h4>Thông tin xe</h4>

        <p id="car-name">Giá</p>

        <p id="car-version"></p>

        <p id="final-price"></p>

        <p>
            <b>Ngoại thất:</b>
            <span id="final-exterior"></span>
        </p>

        <p>
            <b>Nội thất:</b>
            <span id="final-interior"></span>
        </p>

    </div>

    <!-- THÔNG TIN CHỦ XE -->
    <div class="config-group">
        <b>Thông tin chủ xe</b>

        <p id="final-name">Chủ xe:</p>
        <p id="final-email">Email:</p>
        <p id="final-phone">Số điện thoại:</p>
        <p id="final-cccd">Số CCCD:</p>

        <b id="final-showroom">Showroom nhận xe:</b>
        <p id="final-sale">Quản lý:</p>
    </div>

    <!-- THANH TOÁN -->
    <div class="config-group">
        <h4>Hình thức thanh toán</h4><br>
 
        <div class="vnpay-button">

    <img src="{{ url('images/vnpay.png') }}" alt="VNPAY" />

    <span>Cọc 10% bằng VNPAY</span>
 
    </div><br>
    <div class="commit-box">

    <label>
        <input type="checkbox" class="commit-check" name="commit[]" value="1">
        Tôi cam kết các thông tin đã cung cấp tại đây hoàn toàn chính xác.
    </label>

    <label>
        <input type="checkbox" class="commit-check" name="commit[]" value="2">
        Tôi đã đọc, hiểu rõ và xác nhận đồng ý với toàn bộ nội dung
        Điều khoản trong Thỏa thuận Đặt Cọc.
    </label>

    <label>
        <input type="checkbox" class="commit-check" name="commit[]" value="3">
        Tôi đồng ý với Điều kiện & Điều khoản của Shop Online.
    </label>

    <label>
        <input type="checkbox" class="commit-check" name="commit[]" value="4">
        Tôi đồng ý cho phép Công ty TNHH Kinh doanh Thương mại và Dịch vụ shop xử lý dữ liệu cá nhân của tôi.
    </label>

</div>
<p class="deposit-money">
    Số tiền đặt cọc:
    <b id="deposit-amount"></b>
</p>
    </div>

    <button type="submit"
    class="deposit-btn payment-btn">

    XÁC NHẬN THANH TOÁN ĐẶT CỌC

</button>
</div>
</form>
</div>
</div>
</section>

@endsection

@section('my_javascript')

<script>

$(function(){
let vendors = @json($vendors);
    // ===== GIÁ GỐC =====
    let basePrice = {{ $product->price }};

    // ===== UPDATE GIÁ =====
    function updatePrice(extraPrice = 0){

        let total = basePrice + parseInt(extraPrice);

        $("#car-price").html(
            total.toLocaleString('vi-VN') + ' VNĐ'
        );

        $("#step2-price").html(
            total.toLocaleString('vi-VN') + ' VNĐ'
        );

        $("#final-price").html(
            total.toLocaleString('vi-VN') + ' VNĐ'
        );
         let deposit = total * 0.1;

    $("#deposit-amount").text(
        deposit.toLocaleString('vi-VN') + ' VNĐ'
    );
    }
  
    // ===== STEP =====
    function goStep(step){

        $(".step-content").hide();

        $("#step-"+step+"-content").show();

        $(".step-item").removeClass("active");

        $("#step-"+step+"-btn").addClass("active");
    }

    // ===== CHUYỂN STEP =====
    $("#to-step-2").click(function(){

        let price = $("#car-price").text();

        $("#step2-price").text(price);

        goStep(2);
    });

    
    $("#to-step-3").click(function(){

    // RESET LỖI
    $(".error-message").text("");

    $(".deposit-input").removeClass("is-invalid");

    let name      = $("#name").val().trim();
    let phone     = $("#phone").val().trim();
    let email     = $("#email").val().trim();
    let cccd      = $("#cccd").val().trim();
    let province  = $("#province").val();
    let showroom  = $("#showroom").val();
    let sale      = $("#sale").val();

    let hasError = false;

    // HỌ TÊN
    if(name == ""){

        $("#name").addClass("is-invalid");

        $("#name-error").text(
            "Bạn chưa nhập họ tên"
        );

        hasError = true;
    }

    // PHONE
    if(phone == ""){

        $("#phone").addClass("is-invalid");

        $("#phone-error").text(
            "Bạn chưa nhập số điện thoại"
        );

        hasError = true;
    }

    // CCCD
    if(cccd == ""){

        $("#cccd").addClass("is-invalid");

        $("#cccd-error").text(
            "Bạn chưa nhập CCCD"
        );

        hasError = true;
    }

    // EMAIL
    if(email == ""){

        $("#email").addClass("is-invalid");

        $("#email-error").text(
            "Bạn chưa nhập email"
        );

        hasError = true;
    }

    // TỈNH
    if(province == ""){

        $("#province").addClass("is-invalid");

        $("#province-error").text(
            "Bạn chưa chọn tỉnh thành"
        );

        hasError = true;
    }

    // SHOWROOM
    if(showroom == ""){

        $("#showroom").addClass("is-invalid");

        $("#showroom-error").text(
            "Bạn chưa chọn showroom"
        );

        hasError = true;
    }

    // QUẢN LÝ
   

    if(hasError){
        return;
    }

    // INFO STEP 3
    $("#final-name").text("Chủ xe: " + name);

    $("#final-email").text("Email: " + email);

    $("#final-phone").text("Số điện thoại: " + phone);

    $("#final-cccd").text(
        "Số CCCD: " + cccd
    );

    $("#final-showroom").text(
        "Showroom nhận xe: " + showroom
    );

    $("#final-sale").text(
        "Quản lý: " + sale
    );

    // INPUT HIDDEN
    $("#input-car-price").val(
        $("#final-price").text()
    );

    $("#input-deposit-price").val(
        $("#deposit-amount").text()
    );

    $("#input-name").val(name);

    $("#input-phone").val(phone);

    $("#input-email").val(email);

    $("#input-cccd").val(cccd);

    $("#input-showroom").val(showroom);

    $("#input-manager").val(sale);

    $("#input-exterior").val(
        $("#final-exterior").text()
    );

    $("#input-interior").val(
        $("#final-interior").text()
    );

    goStep(3);

});

    // ===== CLICK STEP =====
    $("#step-1-btn").click(()=>goStep(1));

    $("#step-2-btn").click(()=>goStep(2));

    $("#step-3-btn").click(()=>goStep(3));

    // ===== ĐỔI NGOẠI THẤT =====
    $(".exterior-item").click(function(){

        $(".exterior-item").removeClass("active");

        $(this).addClass("active");

        let image = $(this).data("image");

        let colorName = $(this).data("name");
let colorId = $(this).data("id");

$("#product_color_id").val(colorId);
        let extraPrice = parseInt(
            $(this).data("price")
        ) || 0;

        // đổi ảnh
       if(image){
    $("#main-car-image").attr("src", image);
}

        // đổi tên màu
        $("#selected-exterior").text(colorName);

        $("#final-exterior").text(colorName);

        // đổi giá
        updatePrice(extraPrice);
    });

    // ===== ĐỔI NỘI THẤT =====
    $(".interior-item").click(function(){

        $(".interior-item").removeClass("active");

        $(this).addClass("active");

        let interiorName = $(this).data("name");

        $("#selected-interior").text(interiorName);

        $("#final-interior").text(interiorName);
    });

    // ===== LOAD MẶC ĐỊNH =====
   let defaultActive = $(".exterior-item.active");

if(defaultActive.length){

    let defaultPrice = parseInt(
        defaultActive.data("price")
    ) || 0;

    let defaultColor = defaultActive.data("name");
    $("#product_color_id").val(
    defaultActive.data("id")
);

    updatePrice(defaultPrice);

    $("#selected-exterior").text(defaultColor);

    $("#final-exterior").text(defaultColor);
}

    // ===== LOAD NỘI THẤT MẶC ĐỊNH =====
    let defaultInterior = $(".interior-item.active");

    if(defaultInterior.length){

        let interiorName = defaultInterior.data("name");

        $("#selected-interior").text(interiorName);

        $("#final-interior").text(interiorName);
    }

    // ===== ĐẾM KÝ TỰ =====
    $("#name").on("input", function(){

        let length = $(this).val().length;

        $("#name-count").text(length + " / 80");
    });
$("#province").change(function () {

    let province = $(this).val();

    $("#showroom").html(
        '<option value="">Chọn showroom</option>'
    );

    if(province == ""){

        $("#showroom").prop("disabled", true);

        return;
    }

    $("#showroom").prop("disabled", false);

    let filterVendors = vendors.filter(
        vendor => vendor.province === province
    );

    filterVendors.forEach(vendor => {

        $("#showroom").append(`
            <option value="${vendor.name}">
                ${vendor.name}
            </option>
        `);

    });
    $("#sale").html(
    '<option value="">Quản lý showroom</option>'
);

$("#sale").prop("disabled", true);

});
$("#showroom").change(function(){

    let showroom = $(this).val();

    $("#sale").html(
        '<option value="">Quản lý showroom</option>'
    );

    if(showroom == ""){

        $("#sale").prop("disabled", true);

        return;
    }

    let vendor = vendors.find(
        vendor => vendor.name === showroom
    );

    if(vendor){

        $("#sale").prop("disabled", false);

        $("#sale").append(`
            <option value="${vendor.manager_name}" selected>
                ${vendor.manager_name}
            </option>
        `);
    }

});
$(".deposit-input").on("input change", function(){

    $(this).removeClass("is-invalid");

    let inputId = $(this).attr("id");

    $("#" + inputId + "-error").text("");

});
});
  const checks = document.querySelectorAll('.commit-check');

/* chỉ lấy nút submit ở step 3 */
const button = document.querySelector('#step-3-content .deposit-btn');

/* mặc định disable */
button.disabled = true;

checks.forEach(check => {

    check.addEventListener('change', () => {

        const checkedCount =
            document.querySelectorAll('.commit-check:checked').length;

        if (checkedCount === 4) {

            button.classList.add('deposit-active');

            button.disabled = false;

        } else {

            button.classList.remove('deposit-active');

            button.disabled = true;
        }
    });

});


/* khi qua step 3 thành công */
$("#to-step-3").click(function(){

    // nếu validate OK
   

});

/* submit VNPAY */
$("#vnpay-form").submit(function(e){

    let name      = $("#name").val().trim();
    let phone     = $("#phone").val().trim();
    let email     = $("#email").val().trim();
    let cccd      = $("#cccd").val().trim();
    let province  = $("#province").val();
    let showroom  = $("#showroom").val();

    const checkedCount =
        $(".commit-check:checked").length;

    // kiểm tra step 2
    if(
        name == "" ||
        phone == "" ||
        email == "" ||
        cccd == "" ||
        province == "" ||
        showroom == ""
    ){

        e.preventDefault();

        alert("Bạn chưa nhập đầy đủ thông tin ở bước 2");

        goStep(2);

        return;
    }

    // kiểm tra checkbox
    if(checkedCount < 4){

        e.preventDefault();

        alert("Bạn cần xác nhận đầy đủ các cam kết");

        return;
    }

});
/* lưu trang đặt cọc hiện tại */
localStorage.setItem(
    "last_deposit_url",
    window.location.href
);
</script>

@endsection