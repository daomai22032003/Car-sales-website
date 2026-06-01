@extends('admin.layouts.main')

@section('content')

<section class="content-header">

<h1>
    Chỉnh sửa loại xe

    <a href="{{ route('admin.brand.index') }}"
       class="btn btn-success pull-right">

        <i class="fa fa-list"></i> Danh sách

    </a>
</h1>
</section>

<section class="content">

<div class="row">

    <div class="col-md-6">

        <div class="box box-primary">

            <div class="box-header with-border">
                <h3 class="box-title">Thông tin loại xe</h3>
            </div>

            <form action="{{ route('admin.brand.update', ['brand' => $brand->id]) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="box-body">

                    <!-- TÊN -->
                    <div class="form-group">

                        <label>Tên loại</label>

                        <input type="text"
                               class="form-control"
                               name="name"
                               value="{{ $brand->name }}"
                               placeholder="Ví dụ: Xe mới">

                    </div>

                    <!-- TRẠNG THÁI -->
                    <div class="checkbox">

                        <label>

                            <input type="checkbox"
                                   name="is_active"
                                   value="1"
                                   {{ $brand->is_active ? 'checked' : '' }}>

                            Hiển thị

                        </label>

                    </div>

                </div>

                <div class="box-footer">

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fa fa-save"></i> Cập nhật

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
</section>

@endsection
