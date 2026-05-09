@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <h1>
        Thêm Nhà Cung Cấp
        <a href="{{ route('admin.vendor.index') }}" class="btn btn-success pull-right">
            <i class="fa fa-list"></i> Danh Sách
        </a>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-8">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Thông tin Nhà Cung Cấp</h3>
                </div>

                <form action="{{ route('admin.vendor.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="box-body">

                        {{-- Name --}}
                        <div class="form-group">
                            <label>Tên Nhà Cung Cấp</label>
                            <input type="text" class="form-control" name="name" placeholder="Nhập tên">
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>

                        {{-- Phone --}}
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
                        </div>

                        {{-- Address --}}
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" name="address">
                        </div>
                        {{-- Province --}}
                        <div class="form-group">
                            <label>Tỉnh / Thành phố</label>

                            <input type="text"
                                class="form-control"
                                name="province"
                                placeholder="VD: Hà Nội">
                        </div>
                        {{-- Open time --}}
                        <div class="form-group">
                            <label>Giờ mở cửa</label>
                            <input type="text" class="form-control" name="open_time"
                                   placeholder="VD: 8:00 - 18:00">
                        </div>

                        {{-- Manager --}}
                        <div class="form-group">
                            <label>Tên quản lý</label>
                            <input type="text" class="form-control" name="manager_name">
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="4"></textarea>
                        </div>

                        {{-- Map --}}
                        <div class="form-group">
                            <label>Google Map URL</label>
                            <input type="text" class="form-control" name="map_url"
                                   placeholder="https://maps.google.com/...">
                        </div>

                        {{-- Image --}}
                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file" name="image">
                        </div>

                        {{-- Website --}}
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" class="form-control" name="website">
                        </div>

                        {{-- Position --}}
                        <div class="form-group">
                            <label>Vị trí</label>
                            <input type="number" class="form-control" name="position" value="0">
                        </div>

                        {{-- Status --}}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" name="is_active">
                                Hiển thị
                            </label>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Tạo</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>
@endsection