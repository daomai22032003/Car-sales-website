@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <h1>
        Thêm mới danh mục
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

                <form action="{{ route('admin.category.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="box-body">

                        {{-- Tên --}}
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Nhập tên danh mục"
                                   value="{{ old('name') }}">

                            @error('name')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Ảnh --}}
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" name="image" class="form-control">

                            @error('image')
                                <span style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Vị trí --}}
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input type="number"
                                   name="position"
                                   class="form-control"
                                   value="{{ old('position', 0) }}">
                        </div>

                        {{-- Trạng thái --}}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="is_active" value="1">
                                Hiển thị
                            </label>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Tạo
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</section>
@endsection