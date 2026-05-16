@extends('admin.layouts.main')

@section('content')

<style>
    .table > tbody > tr > td{
        vertical-align: middle !important;
    }

    .user-avatar{
        width: 55px;
        height: 55px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #eee;
    }

    .action-btn{
        width: 36px !important;
        height: 36px !important;
        padding: 0 !important;

        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;

        border-radius: 8px !important;
        margin: 0 2px;
    }

    .action-btn i{
        font-size: 14px;
    }

    .table-hover tbody tr:hover{
        background: #f9fbfd;
        transition: 0.2s;
    }

    .box{
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        border: none;
    }

    .role-admin{
        background: #dd4b39;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .role-customer{
        background: #0073b7;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active{
        background: #00a65a;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    .status-hide{
        background: #999;
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
    }
</style>

<section class="content-header">

    <h1>
        Danh Sách Người Dùng

        <a href="{{route('admin.user.create')}}"
           class="btn btn-success pull-right">

            <i class="fa fa-plus"></i> Thêm User

        </a>
    </h1>

</section>

<section class="content">

    <div class="row">

        <div class="col-xs-12">

            <div class="box">

                <!-- FILTER -->
                <div class="box-header">

                    <form action="{{ route('admin.user.index') }}"
                          method="GET">

                        <div class="row">

                            <!-- KEYWORD -->
                            <div class="col-md-5">

                                <input type="text"
                                       name="tu-khoa"
                                       class="form-control"
                                       placeholder="Họ tên, Email..."
                                       value="{{ $filter['keyword'] ?? '' }}">

                            </div>

                            <!-- STATUS -->
                            <div class="col-md-4">

                                <select name="is_active"
                                        class="form-control">

                                    <option value="">
                                        -- Trạng thái --
                                    </option>

                                    <option value="1"
                                        {{ (isset($filter['is_active']) && $filter['is_active'] === '1') ? 'selected' : '' }}>

                                        Kích hoạt

                                    </option>

                                    <option value="0"
                                        {{ (isset($filter['is_active']) && $filter['is_active'] === '0') ? 'selected' : '' }}>

                                        Chưa kích hoạt

                                    </option>

                                </select>

                            </div>

                            <!-- BUTTON -->
                            <div class="col-md-3">

                                <button type="submit"
                                        class="btn btn-primary">

                                    <i class="fa fa-search"></i> Lọc

                                </button>

                                <a href="{{ route('admin.user.index') }}"
                                   class="btn btn-default">

                                    Reset

                                </a>

                            </div>

                        </div>

                    </form>

                </div>

                <!-- TABLE -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Họ & Tên</th>
                                <th>Email</th>
                                <th>Hình ảnh</th>
                                <th>Phân Quyền</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="160">
                                    Hành động
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($data as $key => $item)

                            <tr class="item-{{ $item->id }}">

                                <!-- NAME -->
                                <td>
                                    <strong>{{ $item->name }}</strong>
                                </td>

                                <!-- EMAIL -->
                                <td>
                                    {{ $item->email }}
                                </td>

                                <!-- AVATAR -->
                                <td>

                                    @if ($item->avatar)

                                        <img src="{{ asset($item->avatar) }}"
                                             class="user-avatar">

                                    @else

                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}"
                                             class="user-avatar">

                                    @endif

                                </td>

                                <!-- ROLE -->
                                <td>

                                    @if($item->role_id == 1)

                                        <span class="role-admin">
                                            <i class="fa fa-shield"></i>
                                            Admin
                                        </span>

                                    @else

                                        <span class="role-customer">
                                            <i class="fa fa-user"></i>
                                            Khách hàng
                                        </span>

                                    @endif

                                </td>

                                <!-- STATUS -->
                                <td>

                                    @if($item->is_active == 1)

                                        <span class="status-active">
                                            Kích hoạt
                                        </span>

                                    @else

                                        <span class="status-hide">
                                            Chưa kích hoạt
                                        </span>

                                    @endif

                                </td>

                                <!-- ACTION -->
                                <td class="text-center">

                                    <!-- VIEW -->
                                   

                                    <!-- EDIT -->
                                    <a href="{{route('admin.user.edit', ['user' => $item->id])}}"
                                       class="btn btn-info action-btn"
                                       title="Sửa">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <!-- DELETE -->
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger action-btn"
                                       onclick="destroyUser({{ $item->id }})"
                                       title="Xóa">

                                        <i class="fa fa-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- PAGINATION -->
                <div class="box-footer clearfix">

                    {{ $data->appends(request()->query())->links() }}

                </div>

            </div>

        </div>

    </div>

</section>

@endsection