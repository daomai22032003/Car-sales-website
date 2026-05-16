@php
    $groupedSpecs = $product->carSpecs->groupBy('group_name');
@endphp

@if($product->carSpecs->count())

<style>

/* ===== SECTION ===== */

.car-specs-section{
    margin-top:25px;
    background:#fff;
}

/* ===== TITLE ===== */

.car-specs-title{

    font-size:22px;
    font-weight:700;

    color:#111;

    margin-bottom:14px;

    line-height:1.4;
}

/* ===== GROUP ===== */

.car-spec-group{

    margin-bottom:10px;

    border:1px solid #e5e5e5;

    overflow:hidden;

    background:#fff;
}

/* ===== HEADER ===== */

.car-spec-header{

    background:#fafafa;

    padding:12px 16px;

    display:flex;
    align-items:center;
    justify-content:space-between;

    cursor:pointer;

    transition:.2s;
}

.car-spec-header:hover{
    background:#f5f5f5;
}

.car-spec-header h3{

    margin:0;

    font-size:15px;
    font-weight:700;

    color:#111;

    text-transform:uppercase;
}

/* ===== ICON ===== */

.car-spec-icon{

    width:24px;
    height:24px;

    border:1px solid #ddd;

    display:flex;
    align-items:center;
    justify-content:center;

    font-size:16px;
    font-weight:600;

    color:#111;

    background:#fff;
}

/* ===== BODY ===== */

.car-spec-body{
    display:none;
}

/* ===== TABLE ===== */

.car-spec-table{

    width:100%;

    border-collapse:collapse;
}

/* ===== ROW ===== */

.car-spec-table tr{
    border-top:1px solid #ececec;
}

.car-spec-table tr:nth-child(even){
    background:#fcfcfc;
}

/* ===== NAME ===== */

.car-spec-name{

    width:50%;

    padding:11px 14px;

    font-size:13px;
    font-weight:500;

    color:#444;

    border-right:1px solid #ececec;
}

/* ===== VALUE ===== */

.car-spec-value{

    width:50%;

    padding:11px 14px;

    font-size:13px;

    color:#111;
}

/* ===== MOBILE ===== */

@media(max-width:768px){

    .car-specs-title{
        font-size:20px;
    }

    .car-spec-header h3{
        font-size:14px;
    }

    .car-spec-table tr{
        display:flex;
        flex-direction:column;
    }

    .car-spec-name,
    .car-spec-value{
        width:100%;
    }

    .car-spec-name{
        border-right:none;
        border-bottom:1px solid #eee;
    }

}

</style>

<div class="car-specs-section">

    <div class="car-specs-title">
        Thông số kỹ thuật {{ $product->name }}
    </div>

    @foreach($groupedSpecs as $group => $specs)

        <div class="car-spec-group">

            <div class="car-spec-header">

                <h3>{{ $group }}</h3>

                <div class="car-spec-icon">+</div>

            </div>

            <div class="car-spec-body">

                <table class="car-spec-table">

                    @foreach($specs as $spec)

                    <tr>

                        <td class="car-spec-name">
                            {{ $spec->spec_name }}
                        </td>

                        <td class="car-spec-value">
                            {{ $spec->spec_value }}
                        </td>

                    </tr>

                    @endforeach

                </table>

            </div>

        </div>

    @endforeach

</div>

<script>

document.querySelectorAll('.car-spec-header').forEach(header => {

    header.addEventListener('click', function(){

        let body = this.nextElementSibling;

        let icon = this.querySelector('.car-spec-icon');

        if(body.style.display === 'block'){

            body.style.display = 'none';

            icon.innerHTML = '+';

        }else{

            body.style.display = 'block';

            icon.innerHTML = '−';

        }

    });

});

// mở group đầu tiên

let firstBody = document.querySelector('.car-spec-body');

let firstIcon = document.querySelector('.car-spec-icon');

if(firstBody){

    firstBody.style.display = 'block';

    firstIcon.innerHTML = '−';

}

</script>

@endif