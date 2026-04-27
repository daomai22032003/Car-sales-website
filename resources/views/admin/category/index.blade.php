@extends('admin.layouts.main')

@section('content')
<section class="content-header">
    <h1>
        Danh Sách Danh Mục
        <a href="{{ route('admin.category.create') }}" class="btn btn-info pull-right">
            <i class="fa fa-plus"></i> Thêm Danh Mục
        </a>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box">

                <!-- Header -->
                <div class="box-header">
                    <div class="box-tools">
                        <div class="input-group input-group-sm hidden-xs" style="width: 200px;">
                            <input type="text" class="form-control pull-right" placeholder="Tìm kiếm...">
                            <div class="input-group-btn">
                                <button class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Body -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">

                        <tr>
                            <th>Tên danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Vị trí</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Hành động</th>
                        </tr>

                        @foreach($data as $item)
                            <tr class="item-{{ $item->id }}">

                                <td>
                                    <strong>{{ $item->name }}</strong>
                                </td>

                                <td>
                                    @if ($item->image)
                                        <img src="{{ asset($item->image) }}" width="50" height="50" style="border-radius:6px;">
                                    @else
                                        <span style="color:#999;">Không có</span>
                                    @endif
                                </td>

                                <td>{{ $item->position }}</td>

                                <td>
                                    @if($item->is_active)
                                        <span class="label label-success">Hiển thị</span>
                                    @else
                                        <span class="label label-default">Ẩn</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a href="{{ route('admin.category.show', $item->id) }}"
                                       class="btn btn-default btn-sm">
                                        Xem
                                    </a>

                                    <a href="{{ route('admin.category.edit', $item->id) }}"
                                       class="btn btn-info btn-sm">
                                        Sửa
                                    </a>

                                    <button class="btn btn-danger btn-sm"
                                            onclick="destroyCategory({{ $item->id }})">
                                        Xóa
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                    </table>
                </div>

                <!-- Footer -->
                <div class="box-footer clearfix">
                    {{ $data->links() }}
                </div>

            </div>

        </div>
    </div>
</section>
@endsection