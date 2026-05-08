@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <h1>
        Chỉnh sửa Nhà Cung Cấp
        <a href="{{ route('admin.vendor.index') }}" class="btn btn-success pull-right">
            <i class="fa fa-list"></i> Danh Sách Nhà Cung Cấp
        </a>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-9">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin Nhà Cung Cấp</h3>
                </div>

                <form action="{{ route('admin.vendor.update', $vendor->id) }}"
                      method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="box-body">

                        {{-- Tên --}}
                        <div class="form-group">
                            <label>Tên nhà cung cấp</label>
                            <input value="{{ $vendor->name }}" type="text"
                                   class="form-control" name="name">
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email</label>
                            <input value="{{ $vendor->email }}" type="text"
                                   class="form-control" name="email">
                        </div>

                        {{-- Phone --}}
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input value="{{ $vendor->phone }}" type="text"
                                   class="form-control" name="phone">
                        </div>

                        {{-- Address --}}
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input value="{{ $vendor->address }}" type="text"
                                   class="form-control" name="address">
                        </div>

                        {{-- Open time --}}
                        <div class="form-group">
                            <label>Giờ mở cửa</label>
                            <input value="{{ $vendor->open_time }}" type="text"
                                   class="form-control" name="open_time"
                                   placeholder="VD: 8:00 - 18:00">
                        </div>

                        {{-- Manager --}}
                        <div class="form-group">
                            <label>Tên quản lý</label>
                            <input value="{{ $vendor->manager_name }}" type="text"
                                   class="form-control" name="manager_name">
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control" name="description" rows="4">{{ $vendor->description }}</textarea>
                        </div>

                        {{-- Map --}}
                        <div class="form-group">
                            <label>Google Map URL</label>
                            <input value="{{ $vendor->map_url }}" type="text"
                                   class="form-control" name="map_url"
                                   placeholder="https://maps.google.com/...">
                        </div>

                        {{-- Website --}}
                        <div class="form-group">
                            <label>Website</label>
                            <input value="{{ $vendor->website }}" type="text"
                                   class="form-control" name="website">
                        </div>

                        {{-- Image --}}
                        <div class="form-group">
                            <label>Ảnh showroom</label>
                            <input type="file" name="new_image">

                            <br>
                            @if($vendor->image)
                                <img src="{{ asset($vendor->image) }}"
                                     width="200"
                                     style="margin-top:10px; border-radius:8px;">
                            @endif
                        </div>

                        {{-- Position --}}
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input type="number" class="form-control"
                                   name="position"
                                   value="{{ $vendor->position }}">
                        </div>

                        {{-- Status --}}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="is_active"
                                    {{ $vendor->is_active ? 'checked' : '' }}>
                                Hiển thị
                            </label>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection