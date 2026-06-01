@extends('admin.layouts.main')

@section('content')

<style>
    .table > tbody > tr > td{
        vertical-align: middle !important;
    }

   
    .status-active{
        background: #00a65a;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    .status-hide{
        background: #999;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    .action-btn{
        width: 38px !important;
        height: 38px !important;
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

    .box-header{
        padding: 15px;
    }

    .box-footer{
        background: #fff;
    }
    .box-tools form input{
    transition: 0.2s;
}

.box-tools form input:focus{
    border-color: #3c8dbc;
    box-shadow: 0 0 5px rgba(60,141,188,0.3);
}

.box-tools form button{
    min-width: 42px;
}
</style>

<section class="content-header">
    <h1>
        Danh Sách Danh Mục

        <a href="{{ route('admin.category.create') }}"
           class="btn btn-success pull-right">
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

                    <div class="box-tools pull-right">
                        <form method="GET"
                            action="{{ url()->current() }}"
                            style="display:flex; gap:8px; align-items:center;">

                            <input type="text"
                                name="keyword"
                                value="{{ request('keyword') }}"
                                class="form-control input-sm"
                                style="width: 220px; border-radius: 6px;"
                                placeholder="Tìm danh mục...">

                            <button class="btn btn-primary btn-sm"
                                    style="border-radius: 6px;">
                                <i class="fa fa-search"></i>
                            </button>

                            @if(request('keyword'))
                                <a href="{{ url()->current() }}"
                                class="btn btn-default btn-sm"
                                style="border-radius: 6px;">
                                    Reset
                                </a>
                            @endif

                        </form>
                    </div>

                </div>

                <!-- Body -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>TT</th>
                                <th>Tên danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="170">
                                    Hành động
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($data as $item)

                            <tr class="item-{{ $item->id }}">
                                
                                     <td>
                                        {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                                    </td>
                                <!-- Tên -->
                                <td>
                                    <strong>{{ $item->name }}</strong>
                                </td>

                                <!-- Ảnh -->
                                <td>
                                    @if ($item->image)

                                                                    <div style="
                                        width:90px;
                                        height:55px;
                                        display:flex;
                                        align-items:center;
                                        justify-content:center;
                                        background:#fff;
                                        border-radius:6px;
                                        overflow:hidden;
                                    ">
                                        <img src="{{ asset($item->image) }}"
                                            style="
                                                max-width:100%;
                                                max-height:100%;
                                                object-fit:contain;
                                            ">
                                    </div>

                                    @else

                                        <span style="color:#999;">
                                            Không có
                                        </span>

                                    @endif
                                </td>

                                <!-- Vị trí -->
                                <td>
                                    <span class="label label-primary">
                                        {{ $item->position }}
                                    </span>
                                </td>

                                <!-- Trạng thái -->
                                <td>

                                    @if($item->is_active)

                                        <span class="status-active">
                                            Hiển thị
                                        </span>

                                    @else

                                        <span class="status-hide">
                                            Ẩn
                                        </span>

                                    @endif

                                </td>

                                <!-- Hành động -->
                                <td class="text-center">

                                    <!-- Xem -->
                                    

                                    <!-- Sửa -->
                                    <a href="{{ route('admin.category.edit', $item->id) }}"
                                       class="btn btn-info action-btn"
                                       title="Sửa">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <!-- Xóa -->
                                    <button class="btn btn-danger action-btn"
                                            onclick="destroyCategory({{ $item->id }})"
                                            title="Xóa">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- Footer -->
                <div class="box-footer clearfix text-center">
                    {{ $data->links() }}
                </div>

            </div>

        </div>
    </div>
</section>

@endsection