@extends('admin.layouts.main')

@section('content')

<style>
    .table > tbody > tr > td{
        vertical-align: middle !important;
    }

    .banner-image{
        width: 50px;
        height: 50px;
        object-fit: cover;
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
</style>

<section class="content-header">
    <h1>
        Danh Sách Banner

        <a href="{{route('admin.banner.create')}}"
           class="btn btn-success pull-right">

            <i class="fa fa-plus"></i> Thêm Banner

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

                        <div class="input-group input-group-sm hidden-xs"
                             style="width: 180px;">

                           <form method="GET" action="{{ url()->current() }}" class="input-group input-group-sm" style="width: 250px;">

    <input type="text"
           name="table_search"
           value="{{ request('table_search') }}"
           class="form-control pull-right"
           placeholder="Search banner...">

    <div class="input-group-btn">
        <button type="submit" class="btn btn-default">
            <i class="fa fa-search"></i>
        </button>

        @if(request('table_search'))
            <a href="{{ url()->current() }}"
               class="btn btn-default"
               style="margin-left:2px;">
                Reset
            </a>
        @endif
    </div>

</form>

                            <div class="input-group-btn">


                            </div>

                        </div>

                    </div>

                </div>

                <!-- Body -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Hình ảnh</th>
                                <th>Target</th>
                                <th>Loại</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="160">
                                    Hành động
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($data as $key => $item)

                            <tr class="item-{{ $item->id }}">

                                <!-- Tiêu đề -->
                                <td>
                                    <strong>{{ $item->title }}</strong>
                                </td>

                                <!-- Ảnh -->
                                <td>

                                    @if ($item->image)

                                        <img src="{{ asset('storage/' . $item->image) }}"
                                             class="banner-image">

                                    @endif

                                </td>

                                <!-- Target -->
                                <td>
                                    {{ ($item->target == 1) ? '_blank' : '_self' }}
                                </td>

                                <!-- Loại -->
                                <td>
                                    {{ ($item->type == 1) ? 'slide' : 'background' }}
                                </td>

                                <!-- Vị trí -->
                                <td>
                                    <span class="label label-primary">
                                        {{ $item->position }}
                                    </span>
                                </td>

                                <!-- Trạng thái -->
                                <td>

                                    @if($item->is_active == 1)

                                        <span class="label label-success">
                                            Hiển thị
                                        </span>

                                    @else

                                        <span class="label label-default">
                                            Ẩn
                                        </span>

                                    @endif

                                </td>

                                <!-- Hành động -->
                                <td class="text-center">

                                    <!-- Xem -->
                                    

                                    <!-- Sửa -->
                                    <a href="{{route('admin.banner.edit', ['banner' => $item->id])}}"
                                       class="btn btn-info action-btn"
                                       title="Sửa">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <!-- Xóa -->
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger action-btn"
                                       onclick="destroyBanner({{ $item->id }})"
                                       title="Xóa">

                                        <i class="fa fa-trash"></i>

                                    </a>

                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection