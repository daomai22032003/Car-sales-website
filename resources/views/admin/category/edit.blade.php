@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <h1>
        Sửa Danh Mục
        <a href="{{ route('admin.category.index') }}" class="btn btn-success pull-right">
            <i class="fa fa-list"></i> Danh Sách
        </a>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-6">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin danh mục</h3>
                </div>

                <form action="{{ route('admin.category.update', $category->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="box-body">

                        {{-- Tên --}}
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ $category->name }}"
                                   placeholder="Nhập tên danh mục">

                            @error('name')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Ảnh --}}
                        <div class="form-group">
                            <label>Ảnh hiện tại</label><br>

                            @if ($category->image)
                                <img src="{{ asset($category->image) }}"
                                     width="120"
                                     style="border-radius:8px; margin-bottom:10px;">
                            @else
                                <p style="color:#999;">Chưa có ảnh</p>
                            @endif

                            <input type="file" name="new_image" class="form-control">
                        </div>

                        {{-- Vị trí --}}
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input type="number"
                                   name="position"
                                   class="form-control"
                                   value="{{ $category->position }}"
                                   placeholder="Nhập vị trí">
                        </div>

                        {{-- Trạng thái --}}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       name="is_active"
                                       value="1"
                                       {{ $category->is_active ? 'checked' : '' }}>
                                Hiển thị
                            </label>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Lưu
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</section>
@endsection