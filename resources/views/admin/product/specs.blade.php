@extends('admin.layouts.main')

@section('content')

<section class="content-header">

    <h1>
        Thông số kỹ thuật:
        {{ $product->name }}
    </h1>

</section>

<section class="content">

<form action="{{ route('admin.product.specs.update', $product->id) }}"
      method="POST">

    @csrf

    <div class="box">

        <div class="box-body">

            @php
                $specs = $product->carSpecs ?? [];
            @endphp

            <style>

                .spec-table{
                    background:#fff;
                    border:1px solid #e5e7eb;
                    border-radius:10px;
                    overflow:hidden;
                }

                .spec-head{
                    display:grid;
                    grid-template-columns: 1.2fr 1.5fr 1.5fr 70px;
                    gap:12px;
                    padding:14px;
                    background:#f7f8fa;
                    border-bottom:1px solid #eee;
                    font-weight:700;
                    font-size:14px;
                }

                .spec-row{
                    display:grid;
                    grid-template-columns: 1.2fr 1.5fr 1.5fr 70px;
                    gap:12px;
                    padding:12px 14px;
                    border-bottom:1px solid #f1f1f1;
                    align-items:center;
                }

                .spec-row:last-child{
                    border-bottom:none;
                }

                .spec-row .form-control{
                    height:42px;
                    border-radius:8px;
                    border:1px solid #dcdfe4;
                    box-shadow:none;
                }

                .spec-row .form-control:focus{
                    border-color:#3c8dbc;
                }

                .remove-spec{
                    width:46px;
                    height:42px;
                    border-radius:8px;
                }

                #add-spec{
                    margin-top:16px;
                    border-radius:8px;
                    padding:10px 18px;
                    font-weight:600;
                }

                .save-btn{
                    margin-top:16px;
                    border-radius:8px;
                    padding:10px 20px;
                    font-weight:600;
                }

                @media(max-width:768px){

                    .spec-head{
                        display:none;
                    }

                    .spec-row{
                        grid-template-columns:1fr;
                    }

                    .remove-spec{
                        width:100%;
                    }

                }

            </style>

            <div class="spec-table">

                <div class="spec-head">

                    <div>Nhóm</div>

                    <div>Tên thông số</div>

                    <div>Giá trị</div>

                    <div></div>

                </div>

                <div id="spec-wrapper">

                    @if(count($specs))

                        @foreach($specs as $spec)

                        <div class="spec-row">

                            <!-- GROUP -->

                            <div>

                                <select name="group_name[]"
                                        class="form-control group-select">

                                    <option value="">
                                        Chọn nhóm
                                    </option>

                                    <option value="KÍCH THƯỚC"
                                        {{ $spec->group_name == 'KÍCH THƯỚC' ? 'selected' : '' }}>
                                        KÍCH THƯỚC
                                    </option>

                                    <option value="ĐỘNG CƠ"
                                        {{ $spec->group_name == 'ĐỘNG CƠ' ? 'selected' : '' }}>
                                        ĐỘNG CƠ
                                    </option>

                                    <option value="NGOẠI THẤT"
                                        {{ $spec->group_name == 'NGOẠI THẤT' ? 'selected' : '' }}>
                                        NGOẠI THẤT
                                    </option>

                                    <option value="NỘI THẤT"
                                        {{ $spec->group_name == 'NỘI THẤT' ? 'selected' : '' }}>
                                        NỘI THẤT
                                    </option>

                                    <option value="AN TOÀN"
                                        {{ $spec->group_name == 'AN TOÀN' ? 'selected' : '' }}>
                                        AN TOÀN
                                    </option>

                                </select>

                            </div>

                            <!-- SPEC -->

                            <div>

                                <select name="spec_name[]"
                                        class="form-control spec-select"
                                        data-selected="{{ $spec->spec_name }}">

                                </select>

                            </div>

                            <!-- VALUE -->

                            <div>

                                <input type="text"
                                       name="spec_value[]"
                                       class="form-control"
                                       value="{{ $spec->spec_value }}">

                            </div>

                            <!-- REMOVE -->

                            <div>

                                <button type="button"
                                        class="btn btn-danger remove-spec">

                                    <i class="fa fa-trash"></i>

                                </button>

                            </div>

                        </div>

                        @endforeach

                    @else

                    <div class="spec-row">

                        <!-- GROUP -->

                        <div>

                            <select name="group_name[]"
                                    class="form-control group-select">

                                <option value="">
                                    Chọn nhóm
                                </option>

                                <option value="KÍCH THƯỚC">
                                    KÍCH THƯỚC
                                </option>

                                <option value="ĐỘNG CƠ">
                                    ĐỘNG CƠ
                                </option>

                                <option value="NGOẠI THẤT">
                                    NGOẠI THẤT
                                </option>

                                <option value="NỘI THẤT">
                                    NỘI THẤT
                                </option>

                                <option value="AN TOÀN">
                                    AN TOÀN
                                </option>

                            </select>

                        </div>

                        <!-- SPEC -->

                        <div>

                            <select name="spec_name[]"
                                    class="form-control spec-select">

                                <option value="">
                                    Chọn thông số
                                </option>

                            </select>

                        </div>

                        <!-- VALUE -->

                        <div>

                            <input type="text"
                                   name="spec_value[]"
                                   class="form-control">

                        </div>

                        <!-- REMOVE -->

                        <div>

                            <button type="button"
                                    class="btn btn-danger remove-spec">

                                <i class="fa fa-trash"></i>

                            </button>

                        </div>

                    </div>

                    @endif

                </div>

            </div>

            <button type="button"
                    class="btn btn-primary"
                    id="add-spec">

                + Thêm thông số

            </button>

            <br>

            <button type="submit"
                    class="btn btn-success save-btn">

                Lưu thông số

            </button>

        </div>

    </div>

</form>

</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function(){

    // ===== DATA =====

    const specData = {

        'KÍCH THƯỚC': [
            'Dài x rộng x cao',
            'Chiều dài cơ sở',
            'Khoảng sáng gầm',
            'Dung tích bình nhiên liệu',
            'Số chỗ ngồi'
        ],

        'ĐỘNG CƠ': [
            'Kiểu động cơ',
            'Nhiên liệu',
            'Mô men xoắn cực đại',
            'Hộp số',
            'Mức tiêu hao nhiên liệu'
        ],

        'NGOẠI THẤT': [
            'Đèn LED',
            'Đèn ban ngày',
            'Gương chỉnh điện',
            'Cửa sổ trời',
            'Mâm xe'
        ],

        'NỘI THẤT': [
            'Màn hình giải trí',
            'Apple CarPlay',
            'Ghế da',
            'Điều hòa tự động',
            'Sạc không dây'
        ],

        'AN TOÀN': [
            'ABS',
            'Camera 360',
            'Cân bằng điện tử',
            'Cruise Control',
            'Túi khí'
        ]

    };

    // ===== LOAD OPTIONS =====

    function loadOptions(item){

        let group = item.find('.group-select').val();

        let select = item.find('.spec-select');

        let current = select.attr('data-selected') || select.val();

        if(!group){

            select.html(`
                <option value="">
                    Chọn thông số
                </option>
            `);

            return;
        }

        let used = [];

        $('.spec-row').each(function(){

            let g = $(this).find('.group-select').val();

            let s = $(this).find('.spec-select').val();

            if(g == group && s){

                used.push(s);

            }

        });

        let html = `
            <option value="">
                Chọn thông số
            </option>
        `;

        specData[group].forEach(function(spec){

            if(used.includes(spec) && spec != current){

                return;

            }

            let selected = current == spec
                ? 'selected'
                : '';

            html += `
                <option value="${spec}" ${selected}>
                    ${spec}
                </option>
            `;

        });

        select.html(html);

        select.removeAttr('data-selected');

    }

    // ===== INIT =====

    $('.spec-row').each(function(){

        loadOptions($(this));

    });

    // ===== CHANGE GROUP =====

    $(document).on('change', '.group-select', function(){

        let item = $(this).closest('.spec-row');

        item.find('.spec-select').attr('data-selected', '');

        loadOptions(item);

    });

    // ===== CHANGE SPEC =====

    $(document).on('change', '.spec-select', function(){

        $('.spec-row').each(function(){

            loadOptions($(this));

        });

    });

    // ===== ADD =====

    $('#add-spec').click(function(){

        let html = `

        <div class="spec-row">

            <div>

                <select name="group_name[]"
                        class="form-control group-select">

                    <option value="">
                        Chọn nhóm
                    </option>

                    <option value="KÍCH THƯỚC">
                        KÍCH THƯỚC
                    </option>

                    <option value="ĐỘNG CƠ">
                        ĐỘNG CƠ
                    </option>

                    <option value="NGOẠI THẤT">
                        NGOẠI THẤT
                    </option>

                    <option value="NỘI THẤT">
                        NỘI THẤT
                    </option>

                    <option value="AN TOÀN">
                        AN TOÀN
                    </option>

                </select>

            </div>

            <div>

                <select name="spec_name[]"
                        class="form-control spec-select">

                    <option value="">
                        Chọn thông số
                    </option>

                </select>

            </div>

            <div>

                <input type="text"
                       name="spec_value[]"
                       class="form-control">

            </div>

            <div>

                <button type="button"
                        class="btn btn-danger remove-spec">

                    <i class="fa fa-trash"></i>

                </button>

            </div>

        </div>

        `;

        $('#spec-wrapper').append(html);

    });

    // ===== REMOVE =====

    $(document).on('click', '.remove-spec', function(){

        $(this).closest('.spec-row').remove();

        $('.spec-row').each(function(){

            loadOptions($(this));

        });

    });

});

</script>

@endsection