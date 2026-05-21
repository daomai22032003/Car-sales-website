@extends('admin.layouts.main')

@section('content')

<style>
    tr td:first-child {
        max-width: 250px;
    }

    .table > tbody > tr > td{
        vertical-align: middle !important;
    }

    .article-image{
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
        Danh Sách Tin Tức

        <a href="{{route('admin.article.create')}}"
           class="btn btn-success">

            <i class="fa fa-plus"></i> Thêm Bài Viết

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

                            

                            <div class="input-group-btn">

                               

                            </div>

                        </div>

                    </div>

                </div>

                <!-- TABLE -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>TT</th>
                                <th>Tiêu đề tin tức</th>
                                <th>Hình ảnh</th>
                                <th>Loại</th>
                                <th>Vị trí</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="140">
                                    Hành động
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($data as $key => $item)

                            <tr class="item-{{ $item->id }}">

                                <!-- STT -->
                                <td>
                                    {{ $key + 1 }}
                                </td>

                                <!-- TITLE -->
                                <td>
                                    {{ substr($item->title, 0, 50) }}
                                </td>

                                <!-- IMAGE -->
                                <td>

                                    @if ($item->image)

                                        <img src="{{asset($item->image)}}"
                                             class="article-image">

                                    @endif

                                </td>

                                <!-- TYPE -->
                                <td>

                                    @if ($item->type === 1)

                                        <span class="label label-primary">
                                            Tin tức
                                        </span>

                                    @elseif ($item->type === 2)

                                        <span class="label label-warning">
                                            Tin khuyến mại
                                        </span>

                                    @else

                                        <span class="label label-success">
                                            Tin nổi bật
                                        </span>

                                    @endif

                                </td>

                                <!-- POSITION -->
                                <td>

                                    <span class="label label-info">
                                        {{ $item->position }}
                                    </span>

                                </td>

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

                                    <!-- EDIT -->
                                    <a href="{{route('admin.article.edit', ['article' => $item->id])}}"
                                       class="btn btn-info action-btn"
                                       title="Sửa">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <!-- DELETE -->
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger action-btn"
                                       onclick="destroyModel('article', {{ $item->id }})"
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

            <!-- PAGINATION -->
            {{ $data->links() }}

        </div>

    </div>

</section>

@endsection