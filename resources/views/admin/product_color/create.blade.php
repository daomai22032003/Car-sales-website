@extends('admin.layouts.main')

@section('content')

<section class="content-header">
    <h1>
        Quản Lý Màu Xe
    </h1>
</section>

<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">
            <h3 class="box-title">
                Thêm màu xe
            </h3>
        </div>

        <form action="{{ route('admin.product-color.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="box-body">

                <div class="form-group">

                    <label>Sản phẩm</label>

                    <select name="product_id"
                        class="form-control">

                    @foreach($products as $product)

                        <option value="{{ $product->id }}"
                            {{ request('product_id') == $product->id ? 'selected' : '' }}>

                            {{ $product->name }}

                        </option>

                    @endforeach

                </select>

                </div>

                <div class="form-group">

                    <label>Tên màu</label>

                    <input type="text"
                           name="color_name"
                           class="form-control">

                </div>

                <div class="form-group">

                    <label>Mã màu</label>

                    <input type="color"
                           name="color_code"
                           class="form-control">

                </div>
               <div class="form-group">

    <label>Giá cộng thêm (VNĐ)</label>

    <input type="number"
           name="extra_price"
           class="form-control"
           value="0"
           placeholder="0">

</div>
                <div class="form-group">

                    <label>Upload nhiều ảnh</label>

                    <input type="file"
                           name="images[]"
                           multiple
                           class="form-control">

                </div>

            </div>

            <div class="box-footer">

                <button type="submit"
                        class="btn btn-primary">

                    Lưu màu xe

                </button>

            </div>

        </form>

    </div>

</section>

@endsection