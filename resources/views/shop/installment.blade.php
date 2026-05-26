@extends('shop.layouts.main')

@section('content')

<style>

body{
    background:#f5f5f5;
}

/* WRAP */

.installment-container{
    max-width:1180px;
    margin:auto;
    padding:40px 20px;
}

/* TITLE */

.installment-title{
    font-size:26px;
    font-weight:700;
    margin-bottom:28px;
    color:#222;
    position:relative;
}

.installment-title:after{
    content:"";
    width:65px;
    height:3px;
    background:#2f80ed;
    position:absolute;
    left:0;
    bottom:-10px;
}

/* BOX */

.installment-box{
    background:#fff;
    border-radius:18px;
    border:1px solid #eee;
    padding:35px;
    overflow:visible;
}

/* GRID */

.calc-grid{
    display:flex;
    gap:30px;
}

.calc-left{
    width:48%;
}

.calc-right{
    width:52%;
}

/* LABEL */

.calc-label{
    display:block;
    font-size:16px;
    font-weight:700;
    margin-bottom:10px;
    color:#222;
}

/* SELECT */

.car-select{
    position:relative;
    z-index:20;
}

.select-box{
    width:100%;
    height:52px;
    border:1px solid #dcdcdc;
    border-radius:10px;
    padding:0 16px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    cursor:pointer;
    background:#fff;
    transition:.2s;
}

.select-box:hover{
    border-color:#2f80ed;
}

.select-box.active{
    border-color:#2f80ed;
    box-shadow:0 0 0 3px rgba(47,128,237,.08);
}

.select-box span{
    font-size:15px;
    color:#666;
    font-weight:500;
}

.select-arrow{
    font-size:18px;
    color:#888;
    transition:.2s;
}

.select-box.active .select-arrow{
    transform:rotate(180deg);
}

/* DROPDOWN */

.dropdown{
    display:none;
    position:absolute;
    top:108%;
    left:0;
    width:560px;
    height:430px;
    background:#fff;
    border-radius:18px;
    box-shadow:0 12px 35px rgba(0,0,0,.12);
    border:1px solid #eee;
    overflow:hidden;
    z-index:999;
}

/* TOP */

.dropdown-top{
    height:48px;
    display:flex;
    align-items:center;
    padding:0 20px;
    font-size:14px;
    border-bottom:1px solid #f1f1f1;
    color:#999;
    font-weight:500;
}

.dropdown-top b{
    color:#2f80ed;
    margin-left:5px;
}

/* BODY */

.dropdown-body{
    display:flex;
    height:calc(100% - 48px);
}

/* LEFT BRAND */

.brand-col{
    width:50%;
    border-right:1px solid #f3f3f3;
    overflow-y:auto;
    padding:8px;
}

/* RIGHT CAR */

.car-col{
    width:50%;
    overflow-y:auto;
    padding:8px;
    background:#fff;
}

/* SCROLL */

.brand-col::-webkit-scrollbar,
.car-col::-webkit-scrollbar{
    width:5px;
}

.brand-col::-webkit-scrollbar-thumb,
.car-col::-webkit-scrollbar-thumb{
    background:#ddd;
    border-radius:20px;
}

/* BRAND ITEM */

//* BRAND ITEM */

.brand-item{
    height:64px;

    display:flex;
    align-items:center;

    padding:0 18px;

    border-radius:12px;

    cursor:pointer;

    transition:.25s;

    margin-bottom:8px;

    border:1px solid #eee;

    background:#fff;
}

.brand-item:hover{
    background:#f7fbff;
}

.brand-item.active{
    background:#edf5ff;
}

/* LEFT */

.brand-left{
    display:flex;
    align-items:center;

    gap:16px;
}

/* LOGO */

.brand-left img{
    width:42px;
    height:42px;

    object-fit:contain;

    display:block;

    flex-shrink:0;
}

/* TEXT */

.brand-name{
    font-size:15px;
    font-weight:600;

    color:#222;

    line-height:1;
}
/* ARROW */

.arrow{
    font-size:13px;
    color:#bbb;
}

/* CAR ITEM */

.car-item{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:9px 10px;
    border-radius:10px;
    cursor:pointer;
    transition:.2s;
}

.car-item:hover{
    background:#f7fbff;
}

/* CAR LEFT */

.car-left{
    display:flex;
    align-items:center;
    gap:12px;
}

/* CAR IMG */

.car-left img{
    width:52px;
    height:30px;
    object-fit:contain;
}

/* CAR NAME */

.car-name{
    font-size:15px;
    font-weight:500;
    color:#222;
    line-height:1.3;
}

/* CAR COUNT */

.car-count{
    color:#111;
    font-size:15px;
}

/* INPUT */

.input-style{
    width:100%;
    height:48px;
    border:1px solid #ddd;
    border-radius:10px;
    padding:0 15px;
    font-size:16px;
    outline:none;
    background:#fff;
}

.input-style:focus{
    border-color:#2f80ed;
}

/* RANGE */

.range-wrap{
    margin-bottom:30px;
}

.range-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:14px;
}

.range-number{
    width:82px;
    height:38px;
    border:1px solid #ddd;
    border-radius:8px;
    text-align:center;
    font-size:15px;
    font-weight:700;
    outline:none;
}

/* SLIDER */

.range-slider{
    width:100%;
    appearance:none;
    height:4px;
    border-radius:20px;
    background:#ccc;
}

.range-slider::-webkit-slider-thumb{
    appearance:none;
    width:22px;
    height:22px;
    border-radius:50%;
    background:#2f80ed;
    cursor:pointer;
    border:4px solid #fff;
    box-shadow:0 2px 8px rgba(0,0,0,.2);
}

/* YEAR */

.year-grid{
    display:grid;
    grid-template-columns:repeat(5,1fr);
    gap:8px;
}

.year-btn{
    height:42px;
    border:none;
    background:#efefef;
    border-radius:8px;
    cursor:pointer;
    font-size:15px;
    transition:.2s;
    font-weight:500;
}

.year-btn:hover{
    background:#e4efff;
}

.year-btn.active{
    background:#2f80ed;
    color:#fff;
    font-weight:700;
}

/* RESULT */

.result-box{
    margin-top:20px;
    background:#ffc400;
    border-radius:14px;
    padding:22px;
    text-align:center;
}

.result-box p{
    margin:0;
    font-size:16px;
}

.result-box h2{
    margin:10px 0;
    font-size:42px;
    color:#d70000;
}

/* RESULT FLEX */

.result-flex{
    background:#ffd95e;
    border-radius:10px;
    padding:16px;
    display:flex;
}

.result-item{
    width:50%;
}

.result-item span{
    display:block;
    font-size:14px;
    color:#444;
}

.result-item b{
    font-size:22px;
    color:#222;
}

/* TABLE */

.table-title{
    text-align:center;
    margin-top:50px;
    font-size:30px;
    font-weight:700;
}

.installment-table{
    width:100%;
    border-collapse:collapse;
    margin-top:25px;
    overflow:hidden;
    border-radius:14px;
}

.installment-table th{
    background:#2f80ed;
    color:#fff;
    padding:15px;
    font-size:15px;
    text-align:center;
}

.installment-table td{
    padding:14px;
    border-bottom:1px solid #eee;
    text-align:center;
    font-size:14px;
}

.installment-table tr:hover{
    background:#f8fbff;
}

/* EMPTY */

.empty-note{
    text-align:center;
    color:#d70000;
    margin-top:25px;
    font-size:18px;
}

/* MOBILE */

@media(max-width:992px){

    .calc-grid{
        flex-direction:column;
    }

    .calc-left,
    .calc-right{
        width:100%;
    }

    .dropdown{
        width:100%;
        height:420px;
    }

}

</style>

<div class="installment-container">

    <div class="installment-title">
        Công Cụ Ước Tính Mua Xe Ô Tô Trả Góp
    </div>

    <div class="installment-box">

        <div class="calc-grid">

            <!-- LEFT -->
            <div class="calc-left">

                <!-- SELECT -->
                <div class="car-select">

                    <label class="calc-label">
                        Bạn muốn mua xe gì?
                    </label>

                    <div class="select-box"
                         onclick="toggleMenu()">

                        <span id="selectedCar">
                            Chọn xe
                        </span>

                        <div class="select-arrow"></div>

                    </div>

                    <!-- DROPDOWN -->
                    <div class="dropdown"
                         id="dropdown">

                        <div class="dropdown-top" id="dropdownTitle">
                            Thương hiệu
                        </div>

                        <div class="dropdown-body">

                            <!-- BRAND -->
                            <!-- BRAND -->
                                <div class="brand-col">

                                    @foreach($categoriesWithProducts as $cat)

                                        <div class="brand-item"
                                            onclick="selectBrand({{ $cat->id }}, event)">

                                            <div class="brand-left">

                                               

                                                    <img src="{{ asset($cat->image) }}">

                                               

                                                <div class="brand-name">
                                                    {{ $cat->name }}
                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            <!-- CAR -->
                            <div class="car-col"
                                 id="carList">

                                <div style="
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    height:100%;
                                    color:#999;
                                    font-size:14px;
                                ">
                                    Chọn hãng xe
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- PRICE -->
                <div style="margin-top:16px;">

                    <label class="calc-label">
                        Giá đàm phán (VND)
                    </label>

                    <input type="text"
                           id="price"
                           class="input-style"
                           value="0"
                           readonly>

                </div>

                <!-- RESULT -->
                <div class="result-box">

                    <p>Mỗi tháng chỉ từ</p>

                    <h2 id="monthly">
                        0 VND
                    </h2>

                    <div class="result-flex">

                        <div class="result-item">

                            <span>Tiền vay (VND)</span>

                            <b id="loan">
                                0
                            </b>

                        </div>

                        <div class="result-item">

                            <span>Tiền lãi (VND)</span>

                            <b id="interestMoney">
                                0
                            </b>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="calc-right">

                <!-- TRẢ TRƯỚC -->
                <div class="range-wrap">

                    <div class="range-top">

                        <div class="calc-label">
                            Trả trước (%)
                        </div>

                        <input type="number"
                               id="percentValue"
                               class="range-number"
                               value="30">

                    </div>

                    <input type="range"
                           id="percent"
                           min="0"
                           max="60"
                           value="30"
                           class="range-slider">

                </div>

                <!-- LÃI -->
                <div class="range-wrap">

                    <div class="range-top">

                        <div class="calc-label">
                            Lãi suất (%/năm)
                        </div>

                       <input type="text"
                               id="interestValue"
                               class="range-number"
                               value="8.5">

                    </div>

                    <input type="range"
                           id="interest"
                           min="5"
                           max="30"
                           step="0.1"
                           value="8.5"
                           class="range-slider">

                </div>

                <!-- YEAR -->
                <div>

                    <div class="calc-label">
                        Kỳ hạn vay (năm)
                    </div>

                    <div class="year-grid">

                        <button class="year-btn">1 năm</button>
                        <button class="year-btn">2 năm</button>
                        <button class="year-btn">3 năm</button>
                        <button class="year-btn">4 năm</button>
                        <button class="year-btn active">5 năm</button>
                        <button class="year-btn">6 năm</button>
                        <button class="year-btn">7 năm</button>
                        <button class="year-btn">8 năm</button>
                        <button class="year-btn">9 năm</button>
                        <button class="year-btn">10 năm</button>

                    </div>

                </div>

            </div>

        </div>

        <!-- TABLE -->

        <div id="tableWrap" style="display:none;">

            <div class="table-title">
                Bảng Tính Phí Trả Góp
            </div>

            <table class="installment-table">

                <thead>

                    <tr>

                        <th>Năm</th>
                        <th>Tiền gốc</th>
                        <th>Tiền lãi</th>
                        <th>Tổng thanh toán</th>
                        <th>Dư nợ còn lại</th>

                    </tr>

                </thead>

                <tbody id="scheduleBody"></tbody>

            </table>

        </div>

        <!-- EMPTY -->
        <div class="empty-note"
             id="emptyNote">

            Vui lòng chọn xe cần tính số tiền trả góp.

        </div>

    </div>

</div>

<script>

let categories = @json($categoriesWithProducts);

window.selectedYears = 5;
window.currentPrice = 0;

/* TOGGLE MENU */

function toggleMenu(){

    let dropdown =
        document.getElementById('dropdown');

    let selectBox =
        document.querySelector('.select-box');

    if(dropdown.style.display === 'block'){

        dropdown.style.display = 'none';

        selectBox.classList.remove('active');

    }else{

        dropdown.style.display = 'block';

        selectBox.classList.add('active');

    }

}

/* BRAND */

function selectBrand(catId, event){

    document.querySelectorAll('.brand-item').forEach(item=>{

        item.classList.remove('active');

    });

    event.currentTarget.classList.add('active');
    document.getElementById('dropdownTitle').innerHTML =
        'Thương hiệu <b>› Dòng xe</b>';
    let carList =
        document.getElementById('carList');

    carList.innerHTML = '';

    let cat =
        categories.find(c => c.id == catId);

    if(cat && cat.products){

        cat.products.forEach(p=>{

            carList.innerHTML += `

                <div class="car-item"
                     onclick="selectCar('${p.name}', '${p.price}')">

                    <div class="car-left">

                        <img src="/${p.image}">

                        <div class="car-name">
                            ${p.name}
                        </div>

                    </div>

                   

                </div>

            `;

        });

    }

}

/* SELECT CAR */

function selectCar(name, price){

    document.getElementById('selectedCar').innerText =
        name;

    window.currentPrice =
        Number(String(price).replace(/,/g,'')) || 0;

    document.getElementById('price').value =
        window.currentPrice.toLocaleString('vi-VN');

    document.getElementById('dropdown').style.display =
        'none';

    document.querySelector('.select-box')
        .classList.remove('active');

    document.getElementById('tableWrap').style.display =
        'block';

    document.getElementById('emptyNote').style.display =
        'none';

    calc();

}

/* CLICK OUTSIDE */

document.addEventListener('click', function(e){

    if(!e.target.closest('.car-select')){

        document.getElementById('dropdown').style.display =
            'none';

        document.querySelector('.select-box')
            .classList.remove('active');

    }

});

/* YEAR */

document.querySelectorAll('.year-btn').forEach(btn=>{

    btn.addEventListener('click', function(){

        document.querySelectorAll('.year-btn').forEach(b=>{

            b.classList.remove('active');

        });

        this.classList.add('active');

        window.selectedYears =
            parseInt(this.innerText);

        calc();

    });

});

/* ===== RANGE -> INPUT ===== */

/* TRẢ TRƯỚC */

let percentRange =
    document.getElementById('percent');

let percentInput =
    document.getElementById('percentValue');

percentRange.addEventListener('input', function(){

    percentInput.value = this.value;

    calc();

});

/* INPUT -> RANGE */

percentInput.addEventListener('input', function(){

    let value = parseFloat(this.value);

    if(isNaN(value)){
        value = 0;
    }

    if(value < 0){
        value = 0;
    }

    if(value > 60){
        value = 60;
    }

    this.value = value;

    percentRange.value = value;

    calc();

});


/* ===== LÃI SUẤT ===== */

let interestRange =
    document.getElementById('interest');

let interestInput =
    document.getElementById('interestValue');

/* RANGE -> INPUT */

interestRange.addEventListener('input', function(){

    interestInput.value = this.value;

    calc();

});

/* INPUT -> RANGE */

interestInput.addEventListener('keyup', function(){

    let raw =
        this.value.replace(',', '.');

    /* cho phép nhập dấu . */

    if(raw.endsWith('.')){
        return;
    }

    let value = parseFloat(raw);

    if(isNaN(value)){
        return;
    }

    if(value < 5){
        value = 5;
    }

    if(value > 30){
        value = 30;
    }

    interestRange.value = value;

    calc();

});
/* blur */

interestInput.addEventListener('blur', function(){

    let value =
        parseFloat(this.value.replace(',', '.'));

    if(isNaN(value)){
        value = 5;
    }

    if(value < 5){
        value = 5;
    }

    if(value > 30){
        value = 30;
    }

    this.value = value;

    interestRange.value = value;

});

/* CALC */

function calc(){

    if(window.currentPrice <= 0){

        return;

    }

    let price =
        window.currentPrice;

    let percent =
        parseFloat(
            document.getElementById('percent').value
        ) || 0;

    let interest =
        parseFloat(
            document.getElementById('interest').value
        ) || 0;

    let years =
        window.selectedYears || 5;

    let downPayment =
        price * percent / 100;

    let loan =
        price - downPayment;

    let totalInterest =
        loan * (interest / 100) * years;

    let totalPayment =
        loan + totalInterest;

    let monthly =
        totalPayment / (years * 12);

    /* UI */

    document.getElementById('monthly').innerText =
        Math.round(monthly).toLocaleString('vi-VN') + ' VND';

    document.getElementById('loan').innerText =
        Math.round(loan).toLocaleString('vi-VN');

    document.getElementById('interestMoney').innerText =
        Math.round(totalInterest).toLocaleString('vi-VN');

    /* TABLE */

    let tbody =
        document.getElementById('scheduleBody');

    tbody.innerHTML = '';

    let remain = loan;

    for(let i = 1; i <= years; i++){

        let principal =
            loan / years;

        let interestYear =
            remain * (interest / 100);

        let totalYear =
            principal + interestYear;

        remain -= principal;

        tbody.innerHTML += `

            <tr>

                <td>Năm ${i}</td>

                <td>
                    ${Math.round(principal).toLocaleString('vi-VN')} đ
                </td>

                <td>
                    ${Math.round(interestYear).toLocaleString('vi-VN')} đ
                </td>

                <td>
                    ${Math.round(totalYear).toLocaleString('vi-VN')} đ
                </td>

                <td>
                    ${remain > 0
                        ? Math.round(remain).toLocaleString('vi-VN')
                        : 0} đ
                </td>

            </tr>

        `;

    }

}

</script>

@endsection