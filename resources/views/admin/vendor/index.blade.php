@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <h1>
        Danh Sách Nhà Cung Cấp
        <a href="{{ route('admin.vendor.create') }}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i> Thêm Nhà Cung Cấp
        </a>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">
                <div class="box-header">
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 200px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên NCC</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Địa chỉ</th>
                                <th>Giờ mở cửa</th>
                                <th>Quản lý</th>
                                <th>Ảnh</th>
                                <th>Website</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($data as $item)
                                <tr class="item-{{ $item->id }}">
                                    <td>{{ $item->id }}</td>

                                    <td><strong>{{ $item->name }}</strong></td>

                                    <td>{{ $item->email }}</td>

                                    <td>{{ $item->phone }}</td>

                                    <td>{{ $item->address ?? '---' }}</td>

                                    <td>{{ $item->open_time ?? '---' }}</td>

                                    <td>{{ $item->manager_name ?? '---' }}</td>

                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset($item->image) }}"
                                                 width="50" height="50"
                                                 style="object-fit: cover; border-radius: 6px;">
                                        @else
                                            <span class="text-muted">No img</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if ($item->website)
                                            <a href="{{ $item->website }}" target="_blank">
                                                Link
                                            </a>
                                        @else
                                            ---
                                        @endif
                                    </td>

                                    <td>{{ $item->position }}</td>

                                    <td>
                                        @if ($item->is_active)
                                            <span class="label label-success">Hiển thị</span>
                                        @else
                                            <span class="label label-danger">Ẩn</span>
                                        @endif
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('admin.vendor.edit', $item->id) }}"
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <a href="javascript:void(0)"
                                           class="btn btn-sm btn-danger"
                                           onclick="destroyVendor({{ $item->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center text-danger">
                                        Không có dữ liệu
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    function destroyVendor(id) {
        if (confirm('Bạn có chắc muốn xóa không?')) {
            window.location.href = '/admin/vendor/delete/' + id;
        }
    }
</script>
@endsection