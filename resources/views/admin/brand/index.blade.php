@extends('admin.layouts.main')

@section('content')

<style>
    .table > tbody > tr > td{
        vertical-align: middle !important;
    }

    .brand-image{
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
        Danh Sách Loại

        <a href="{{route('admin.brand.create')}}"
           class="btn btn-success pull-right">

            <i class="fa fa-plus"></i> Thêm Loại

        </a>
    </h1>

</section>

<section class="content">

    <div class="row">

        <div class="col-xs-12">

            <div class="box">

                <!-- HEADER -->
                <div class="box-header">

                    <div class="box-tools">

                        <div class="input-group input-group-sm hidden-xs"
                             style="width: 180px;">

                            <input type="text"
                                   name="table_search"
                                   class="form-control pull-right"
                                   placeholder="Search">

                            <div class="input-group-btn">

                                <button type="submit"
                                        class="btn btn-default">

                                    <i class="fa fa-search"></i>

                                </button>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Tên loại</th>
                                <th>Hình ảnh</th>
                                
                              
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

                                <!-- IMAGE -->
                                <td>

                                    @if ($item->image)

                                        <img src="{{asset($item->image)}}"
                                             class="brand-image">

                                    @endif

                                </td>

                                <!-- WEBSITE -->
                                

                                <!-- POSITION -->
                                

                                <!-- STATUS -->
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

                                <!-- ACTION -->
                                <td class="text-center">

                                    <!-- VIEW -->
                                    

                                    <!-- EDIT -->
                                    <a href="{{route('admin.brand.edit', ['brand' => $item->id])}}"
                                       class="btn btn-info action-btn"
                                       title="Sửa">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <!-- DELETE -->
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger action-btn"
                                       onclick="destroyBrand({{ $item->id }})"
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