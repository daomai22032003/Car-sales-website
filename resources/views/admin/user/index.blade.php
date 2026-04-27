@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Danh Sách Người Dùng <a href="{{route('admin.user.create')}}" class="btn btn-info pull-right"><i
                    class="fa fa-plus"></i> Thêm User</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="{{ route('admin.user.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="tu-khoa" class="form-control" placeholder="Họ tên, Email..."
                                        value="{{ $filter['keyword'] ?? '' }}">
                                </div>
                                <div class="col-md-4">
                                    <select name="is_active" class="form-control">
                                        <option value="">-- Trạng thái --</option>
                                        <option value="1" {{ (isset($filter['is_active']) && $filter['is_active'] === '1') ? 'selected' : '' }}>Kích hoạt</option>
                                        <option value="0" {{ (isset($filter['is_active']) && $filter['is_active'] === '0') ? 'selected' : '' }}>Chưa kích hoạt</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Lọc</button>
                                    <a href="{{ route('admin.user.index') }}" class="btn btn-default">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Họ & Tên</th>
                                    <th>Email</th>
                                    <th>Hình ảnh</th>
                                    <th>Phân Quyền</th>
                                    <th>Trạng thái</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        @if ($item->avatar) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->avatar)}}" width="70">
                                        @endif
                                    </td>
                                    <td>{{ ($item->role_id == 1) ? 'Manager' : 'Admin' }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Kích hoạt' : 'Chưa kích hoạt' }}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.user.show', ['user' => $item->id])}}"
                                            class="btn btn-default">Xem</a>
                                        <a href="{{route('admin.user.edit', ['user' => $item->id])}}"
                                            class="btn btn-info">Sửa</a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-danger"
                                            onclick="destroyUser({{ $item->id }})">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $data->appends(request()->query())->links() }}
                    </div>
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection