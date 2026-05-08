@extends('admin.layouts.main')
@section('content')

<style>
    .w-50 { width: 50% }
</style>

<section class="content-header">
    <h1>
        Chỉnh sửa thông tin sản phẩm 
        <a href="{{route('admin.product.index')}}" class="btn btn-success pull-right">
            <i class="fa fa-list"></i> Danh Sách SP
        </a>
    </h1>
</section>

<section class="content">
<div class="row">
<div class="col-md-9">

{{-- ERROR --}}
@if ($errors->any())

<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<div class="box box-primary">
<div class="box-header with-border">
    <h3 class="box-title">Thông tin sản phẩm</h3>
</div>

<form action="{{route('admin.product.update', $product->id)}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

<div class="box-body">

{{-- NAME --}}

<div class="form-group">
    <label>Tên sản phẩm</label>
    <input type="text" class="form-control" name="name"
           value="{{ old('name', $product->name) }}">
</div>

{{-- IMAGE --}}

<div class="form-group">
    <label>Ảnh chính</label>
    <input type="file" name="new_image"><br>
    @if ($product->image)
        <img src="{{asset($product->image)}}" width="200">
    @endif
</div>

{{-- EXTERIOR --}}

<div class="form-group">
    <label>Ảnh ngoại thất hiện tại</label><br>
    @foreach($product->exteriorImages ?? [] as $img)
        <div style="display:inline-block; margin:5px;">
            <img src="{{ asset($img->image) }}" width="120"><br>
            <input type="checkbox" name="delete_exterior_images[]" value="{{ $img->id }}"> Xóa
        </div>
    @endforeach
</div>

<div class="form-group">
    <label>Thêm ảnh ngoại thất</label>
    <input type="file" name="exterior_images[]" multiple class="form-control">
</div>

{{-- INTERIOR --}}

<div class="form-group">
    <label>Ảnh nội thất hiện tại</label><br>
    @foreach($product->interiorImages ?? [] as $img)
        <div style="display:inline-block; margin:5px;">
            <img src="{{ asset($img->image) }}" width="120"><br>
            <input type="checkbox" name="delete_interior_images[]" value="{{ $img->id }}"> Xóa
        </div>
    @endforeach
</div>

<div class="form-group">
    <label>Thêm ảnh nội thất</label>
    <input type="file" name="interior_images[]" multiple class="form-control">
</div>

{{-- STOCK --}}

<div class="form-group">
    <label>Số lượng</label>
    <input type="number" class="form-control w-50" name="stock"
           value="{{ old('stock', $product->stock) }}">
</div>

{{-- POSITION --}}

<div class="form-group">
    <label>Vị trí</label>
    <input type="number" class="form-control w-50" name="position"
           value="{{ old('position', $product->position ?? 0) }}">
</div>

{{-- PRICE --}}

<div class="row">
<div class="col-lg-6">
    <label>Giá</label>
    <input type="number" class="form-control" name="price"
           value="{{ old('price', $product->price) }}">
</div>
<div class="col-lg-6">
    <label>Giá KM</label>
    <input type="number" class="form-control" name="sale"
           value="{{ old('sale', $product->sale) }}">
</div>
</div>

{{-- CATEGORY --}}

<div class="form-group">
    <label>Danh mục</label>
    <select class="form-control w-50" name="category_id">
        <option value="">-- chọn --</option>
        @foreach($categories as $c)
            <option value="{{ $c->id }}"
                {{ old('category_id', $product->category_id) == $c->id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- BRAND --}}

<div class="form-group">
    <label>Loại</label>
    <select class="form-control w-50" name="brand_id">
        <option value="">-- chọn --</option>
        @foreach($brands as $b)
            <option value="{{ $b->id }}"
                {{ old('brand_id', $product->brand_id) == $b->id ? 'selected' : '' }}>
                {{ $b->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- VENDOR --}}

<div class="form-group">
    <label>Nhà cung cấp</label>
    <select class="form-control w-50" name="vendor_id">
        <option value="">-- chọn --</option>
        @foreach($vendors as $v)
            <option value="{{ $v->id }}"
                {{ old('vendor_id', $product->vendor_id) == $v->id ? 'selected' : '' }}>
                {{ $v->name }}
            </option>
        @endforeach
    </select>
</div>

{{-- SKU --}}

<div class="form-group">
    <label>SKU</label>
    <input type="text" class="form-control w-50" name="sku"
           value="{{ old('sku', $product->sku) }}">
</div>

{{-- CHECKBOX --}}

<div class="form-group">
    <input type="hidden" name="is_active" value="0">
    <label>
        <input type="checkbox" name="is_active" value="1"
            {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
        Trạng thái
    </label>
</div>

<div class="form-group">
    <input type="hidden" name="is_hot" value="0">
    <label>
        <input type="checkbox" name="is_hot" value="1"
            {{ old('is_hot', $product->is_hot) ? 'checked' : '' }}>
        Sản phẩm Hot
    </label>
</div>

{{-- URL --}}

<div class="form-group">
    <label>Liên kết (URL)</label>
    <input type="text" class="form-control" name="url"
           value="{{ old('url', $product->url) }}">
</div>

{{-- SUMMARY --}}

<div class="form-group">
    <label>Tóm tắt</label>
    <textarea id="editor2" name="summary" class="form-control" rows="5">
{{ old('summary', $product->summary) }}
    </textarea>
</div>

{{-- DESCRIPTION --}}

<div class="form-group">
    <label>Mô tả</label>
    <textarea id="editor1" name="description" class="form-control" rows="10">
{{ old('description', $product->description) }}
    </textarea>
</div>

{{-- META --}}

<div class="form-group">
    <label>Meta Title</label>
    <input type="text" class="form-control" name="meta_title"
           value="{{ old('meta_title', $product->meta_title) }}">
</div>

<div class="form-group">
    <label>Meta Description</label>
    <textarea name="meta_description" class="form-control" rows="3">
{{ old('meta_description', $product->meta_description) }}
    </textarea>
</div>

</div>

<div class="box-footer">
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</div>

</form>
</div>

</div>
</div>
</section>
@endsection

@section('my_javascript')

<script>
$(function () {
    var editor1 = CKEDITOR.replace('editor1');
    editor1.config.height = 400;

    var editor2 = CKEDITOR.replace('editor2');
    editor2.config.height = 200;
});
</script>

@endsection
