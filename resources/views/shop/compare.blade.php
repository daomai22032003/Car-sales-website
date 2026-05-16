

<style>

body{
    background:#f5f5f5;
}

/* PAGE */

.compare-page{
    padding:28px 0 70px;
}

/* TITLE */

.compare-title{
    font-size:18px;
    font-weight:800;
    color:#111;
    margin-bottom:24px;
    position:relative;
    padding-bottom:10px;
}

.compare-title:after{
    content:"";
    width:70px;
    height:3px;
    background:#2f80ed;
    position:absolute;
    left:0;
    bottom:0;
}

/* TOP */

.compare-top{
    display:flex;
    align-items:flex-start;
    gap:14px;
    margin-bottom:24px;
}

/* SAME */

.same-wrap{
    width:145px;
    padding-top:34px;
}

.same-toggle{
    width:58px;
    height:30px;
    border-radius:50px;
    background:#ddd;
    position:relative;
    cursor:pointer;
    transition:.25s;
}

.same-toggle.active{
    background:#2f80ed;
}

.same-toggle span{
    width:24px;
    height:24px;
    border-radius:50%;
    background:#fff;
    position:absolute;
    top:3px;
    left:3px;
    transition:.25s;
}

.same-toggle.active span{
    left:31px;
}

.same-text{
    margin-top:10px;
    font-size:14px;
    font-weight:700;
    color:#111;
}

/* SELECT */

.compare-select-wrap{
    display:flex;
    gap:8px;
    align-items:flex-start;
    justify-content:flex-start;
    padding-left:55px;
}

/* BOX */

.compare-box{
    flex:1;
    max-width:220px;
    min-width:220px;
    min-height:180px;
    background:#fff;
    border:1px dashed #d9d9d9;
    border-radius:14px;
    position:relative;
    overflow:visible;
    transition:.2s;
}

.compare-box:hover{
    border-color:#2f80ed;
}

/* EMPTY */

.compare-add{
    height:180px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    cursor:pointer;
}

.compare-plus{
    width:42px;
    height:42px;
    background:#f3f3f3;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
    margin-bottom:12px;
}

.compare-add p{
    margin:0;
    font-size:15px;
    font-weight:700;
}

/* SELECTED */

.selected-car{
    width:100%;
}

.selected-car img{
    width:100%;
    height:120px;
    object-fit:cover;
    display:block;
    border-radius:14px 14px 0 0;
}

.selected-car h3{
    padding:8px 10px 0;
    margin:0;
    font-size:14px;
    line-height:1.4;
    font-weight:800;
    text-align:center;
    min-height:52px;
}

.compare-price{
    text-align:center;
    color:#d70000;
    font-size:15px;
    font-weight:800;
    padding-bottom:12px;
}

/* REMOVE */

.change-btn{
    position:absolute;
    top:-10px;
    right:-10px;
    width:28px;
    height:28px;
    border:none;
    border-radius:50%;
    background:#777;
    color:#fff;
    font-size:18px;
    cursor:pointer;
    z-index:20;
}

/* VS */

.compare-box.has-car::after{
    content:"VS";
    position:absolute;
    right:-24px;
    top:52px;
    width:42px;
    height:42px;
    border-radius:50%;
    background:#2f80ed;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:800;
    z-index:10;
}

.compare-box:last-child::after{
    display:none;
}

/* DROPDOWN */

.dropdown{
    display:none;
    position:absolute;
    top:104%;
    left:0;
    width:280px;
    background:#fff;
    border-radius:14px;
    border:1px solid #ececec;
    box-shadow:0 10px 35px rgba(0,0,0,.12);
    z-index:999;
    overflow:hidden;
}

/* HEADER */

.dropdown-header{
    padding:14px 16px 10px;
    border-bottom:1px solid #f1f1f1;
    font-size:14px;
    font-weight:700;
    color:#999;
}

/* HEADER PATH */

.header-wrap{
    display:flex;
    align-items:center;
    gap:6px;
}

.header-root{
    color:#999;
    font-weight:700;
    cursor:pointer;
    transition:.2s;
}

.header-root:hover{
    color:#2f80ed;
}

.header-arrow{
    color:#999;
}

.header-brand{
    color:#2f80ed;
    font-weight:800;
}
/* BRAND LIST */

.brand-list{
    max-height:360px;
    overflow-y:auto;

    padding:12px;

    display:flex;
    flex-direction:column;
    gap:10px;
}

/* BRAND ITEM */

.brand-item{
    display:flex !important;
    flex-direction:row !important;
    align-items:center !important;

    gap:10px;

    padding:7px 10px;

    border-radius:10px;

    cursor:pointer;

    transition:.2s;

    border:1px solid #f1f1f1;

    background:#fff;

    min-height:46px;
}

.brand-item:hover{
    background:#f8fbff;
    border-color:#dbeafe;
}

/* LOGO */

.brand-item img{
   width:30px;
    height:30px;

    object-fit:contain;

    flex-shrink:0;
}

/* TEXT */

.brand-item span{
     font-size:13px;
    font-weight:700;
    color:#111;

    line-height:1.2;
}

/* HEADER */

.dropdown-header{
    padding:12px 16px;

    border-bottom:1px solid #f3f3f3;

    font-size:13px;
    font-weight:700;
    color:#999;

    background:#fff;

    min-height:44px;

    display:flex;
    align-items:center;
}

/* HEADER WRAP */

.header-wrap{
    display:flex;
    align-items:center;
    gap:8px;
}

.header-root{
    color:#999;
    font-weight:700;
    cursor:pointer;
}

.header-arrow{
    color:#bbb;
}

.header-brand{
    color:#2f80ed;
    font-weight:800;

    margin-left:2px;
}
/* CAR LIST */

.car-list{
    display:none;
    max-height:360px;
    overflow-y:auto;
}

/* CAR ITEM */

.car-item{
    display:flex;
    align-items:center;
    gap:12px;
    padding:12px 16px;
    cursor:pointer;
    transition:.2s;
    border-bottom:1px solid #f5f5f5;
}

.car-item:hover{
    background:#f7fbff;
}

.car-item img{
    width:62px;
    height:38px;
    object-fit:contain;
}

.car-item-name{
    font-size:14px;
    font-weight:600;
    line-height:1.4;
}

/* TABLE */

.compare-table{
    background:#fff;
    border:1px solid #dfe3e8;
    overflow-x:auto;
}

/* GROUP */

.compare-group{
    height:52px;
    border-bottom:1px solid #dfe3e8;
    display:flex;
    align-items:center;
    padding:0 14px;
    font-size:15px;
    font-weight:800;
}

/* ROW */

.compare-row{
    display:grid;
    grid-template-columns:200px repeat(4,1fr);
}


/* CELL */

.compare-cell{
    min-height:42px;
    border-right:1px solid #dfe3e8;
    border-bottom:1px solid #dfe3e8;
    padding:10px 12px;
    font-size:14px;
    display:flex;
    align-items:center;
}

.compare-label{
    background:#fafafa;
    color:#666;
}

.diff{
    background:#eef6ff;
    font-weight:700;
    color:#0b57d0;
}

/* MOBILE */

@media(max-width:992px){

    .compare-top{
        flex-direction:column;
    }

    .same-wrap{
        width:100%;
        padding-top:0;
    }

    .compare-box{
        width:220px;
    min-height:205px;
    }

    .dropdown{
        width:100%;
    }

    .compare-row{
        min-width:1000px;
    }

}

</style>

@php

$cars = [
    $car1 ?? null,
    $car2 ?? null,
    $car3 ?? null,
    $car4 ?? null
];

$allSpecs = [];

foreach($cars as $car){

    if($car){

        foreach($car->carSpecs as $spec){

            $allSpecs[$spec->group_name][] =
                $spec->spec_name;
        }
    }
}

@endphp

<div class="compare-page">

    <div class="container">

        <div class="compare-title">
            Công Cụ So Sánh Thông Số Kỹ Thuật Giữa Các Xe Ô Tô 2026
        </div>

        <div class="compare-top">

            <!-- SAME -->

            <div class="same-wrap">

                <div class="same-toggle"
                     id="sameToggle"
                     onclick="toggleSame()">

                    <span></span>

                </div>

                <div class="same-text">
                    Ẩn giống nhau
                </div>

            </div>

            <!-- SELECT -->

            <div class="compare-select-wrap">

                @for($i=1;$i<=4;$i++)

                @php
                    $car = ${'car'.$i} ?? null;
                @endphp

                <div class="compare-box {{ $car ? 'has-car' : '' }}">

                    @if($car)

                        <button class="change-btn"
                                onclick="removeCar({{ $i }},event)">
                            ×
                        </button>

                        <div class="selected-car">

                            <img src="{{ asset($car->image) }}">

                            <h3>
                                {{ $car->name }}
                            </h3>

                            <div class="compare-price">

                                @if($car->sale > 0)

                                    {{ number_format($car->sale,0,",",".") }}

                                @else

                                    {{ number_format($car->price,0,",",".") }}

                                @endif

                                triệu

                            </div>

                        </div>

                    @else

                        <div class="compare-add"
                             onclick="showDropdown({{ $i }},event)">

                            <div class="compare-plus">
                                +
                            </div>

                            <p>Chọn xe</p>

                        </div>

                    @endif

                    <!-- DROPDOWN -->

                    <div class="dropdown"
                         id="dropdown{{ $i }}">

                        <div class="dropdown-header"
                             id="dropdownHeader{{ $i }}">

                            Thương hiệu

                        </div>

                        <!-- BRANDS -->

                        <div class="brand-list"
                             id="brandList{{ $i }}">

                            @foreach($categories as $cat)

                                <div class="brand-item"
                                     onclick="showCars(
                                        {{ $i }},
                                        '{{ $cat->name }}',
                                        {{ $cat->id }}
                                     )">

                                    <img src="{{ asset($cat->image) }}">

                                    <span>

                                        {{ $cat->name }}

                                    </span>

                                </div>

                            @endforeach

                        </div>

                        <!-- CARS -->

                        <div class="car-list"
                             id="carList{{ $i }}">

                        </div>

                    </div>

                </div>

                @endfor

            </div>

        </div>

        <!-- TABLE -->

        @if(
            request('car1') ||
            request('car2') ||
            request('car3') ||
            request('car4')
        )

        <div class="compare-table">

            @foreach($allSpecs as $group => $specNames)

                <div class="compare-group">

                    {{ strtoupper($group) }}

                </div>

                @foreach(array_unique($specNames) as $specName)

                    @php

                    $values = [];

                    foreach($cars as $car){

                        if($car){

                            $values[] =
                                optional(
                                    $car->carSpecs
                                        ->where('group_name',$group)
                                        ->firstWhere('spec_name',$specName)
                                )->spec_value ?? '';

                        }else{

                            $values[] = '';
                        }
                    }

                    $different =
                        count(array_unique(array_filter($values))) > 1;

                    @endphp

                    <div class="compare-row
                        {{ !$different ? 'same-row' : '' }}">

                        <div class="compare-cell compare-label">

                            {{ $specName }}

                        </div>

                        @for($j=0;$j<4;$j++)

                            <div class="compare-cell
                                {{ $different ? 'diff' : '' }}">

                                {{ $values[$j] ?? '' }}

                            </div>

                        @endfor

                    </div>

                @endforeach

            @endforeach

        </div>

        @endif

    </div>

</div>

<script>

const products = @json($products);

let hideSame = false;

/* SHOW DROPDOWN */

function showDropdown(slot,event){

    event.stopPropagation();

    document.querySelectorAll('.dropdown')
        .forEach(d=>{

            d.style.display = 'none';

        });

    document.getElementById('dropdown'+slot)
        .style.display = 'block';
}

/* SHOW CARS */

function showCars(slot,brandName,catId){

    // lấy các xe đã chọn trên URL
    let url = new URL(window.location.href);

    let selectedCars = [
        url.searchParams.get('car1'),
        url.searchParams.get('car2'),
        url.searchParams.get('car3'),
        url.searchParams.get('car4')
    ];

    // lọc xe theo hãng
    let filtered = products.filter(x => x.category_id == catId);

    let html = '';

    filtered.forEach(car=>{

        // bỏ qua xe đang được chọn ở box khác
        if(
            selectedCars.includes(String(car.id))
        ){
            return;
        }

        html += `

            <div class="car-item"
                 onclick="chooseCar(${slot},${car.id})">

                <img src="/${car.image}">

                <div class="car-item-name">

                    ${car.name}

                </div>

            </div>

        `;
    });

    // nếu không còn xe
    if(html === ''){

        html = `

            <div style="
                padding:18px;
                text-align:center;
                font-size:13px;
                color:#888;
            ">
                Không còn xe để chọn
            </div>

        `;
    }

    document.getElementById('dropdownHeader'+slot)
        .innerHTML = `

            <div class="header-wrap">

                <span class="header-root">

                    Thương hiệu

                </span>

                <span class="header-arrow">
                    ›
                </span>

                <span class="header-brand">

                    ${brandName}

                </span>

            </div>

        `;

    document.getElementById('brandList'+slot)
        .style.display = 'none';

    document.getElementById('carList'+slot)
        .style.display = 'block';

    document.getElementById('carList'+slot)
        .innerHTML = html;

    document.querySelector(
        '#dropdownHeader'+slot+' .header-root'
    ).onclick = function(e){

        e.stopPropagation();

        backBrands(slot);
    };
}
/* BACK */

function backBrands(slot){

    document.getElementById('dropdownHeader'+slot)
        .innerHTML = 'Thương hiệu';

   document.getElementById('brandList'+slot)
    .style.display = 'flex';

    document.getElementById('carList'+slot)
        .style.display = 'none';

    document.getElementById('carList'+slot)
        .innerHTML = '';
}

/* CHOOSE */

function chooseCar(slot,id){

    let url =
        new URL(window.location.href);

    url.searchParams.set('car'+slot,id);

    window.location.href =
        url.toString();
}

/* REMOVE */

function removeCar(slot,event){

    event.stopPropagation();

    let url =
        new URL(window.location.href);

    url.searchParams.delete('car'+slot);

    window.location.href =
        url.toString();
}

/* SAME */

function toggleSame(){

    hideSame = !hideSame;

    document.getElementById('sameToggle')
        .classList.toggle('active');

    document.querySelectorAll('.same-row')
        .forEach(row=>{

            row.style.display =
                hideSame ? 'none' : 'grid';

        });
}

/* OUTSIDE */

document.addEventListener('click',function(e){

    if(!e.target.closest('.compare-box')){

        document.querySelectorAll('.dropdown')
            .forEach(d=>{

                d.style.display = 'none';

            });

    }

});

</script>

