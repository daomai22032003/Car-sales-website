@extends('admin.layouts.main')

@section('content')

<section class="content-header">
    <h1>
        {{ $product->name }}
    </h1>
</section>

<section class="content">

    {{-- NÚT THÊM MÀU --}}
    <a href="{{ route('admin.product-color.create') }}"
       class="btn btn-primary"
       style="margin-bottom:15px;">

        + Thêm màu

    </a>

    <div class="box">

        <div class="box-body">

            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>Màu</th>
                        <th>Giá thêm</th>
                        <th>Ảnh</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($product->colors as $color)

                        <tr>

                            {{-- MÀU --}}
                            <td>
                                <span style="
                                    display:inline-block;
                                    width:18px;
                                    height:18px;
                                    border-radius:50%;
                                    background:{{ $color->color_code }};
                                    border:1px solid #ccc;
                                    margin-right:5px;
                                    vertical-align:middle;
                                "></span>

                                {{ $color->color_name }}
                            </td>

                            {{-- GIÁ --}}
                            <td>
                                <strong>
                                    {{ $color->extra_price > 0 ? '+' : '' }}
                                    {{ number_format($color->extra_price) }} đ
                                </strong>
                            </td>

                            {{-- ẢNH --}}
                            <td>
                                @foreach($color->images as $image)
                                    <img src="{{ asset('storage/'.$image->image) }}"
                                         width="55"
                                         style="margin-right:5px; border-radius:5px;">
                                @endforeach
                            </td>

                            {{-- ACTION --}}
                            <td>

                                <a href="{{ route('admin.product-color.edit',$color->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Sửa
                                </a>

                                <form action="{{ route('admin.product-color.destroy', $color->id) }}"
                                      method="POST"
                                      style="display:inline-block;"
                                      onsubmit="return confirm('Xóa màu này?')">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Xóa
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</section>

@endsection