@extends('admin.layouts.main')

@section('content')

<style>
    tr td:first-child {
        max-width: 250px;
    }

    .table > tbody > tr > td{
        vertical-align: middle !important;
    }

    .product-image{
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
        Danh Sách Sản Phẩm

        <a href="{{route('admin.product.create')}}"
           class="btn btn-success">

            <i class="fa fa-plus"></i> Thêm SP

        </a>
    </h1>
</section>

<section class="content">

    <div class="row">

        <div class="col-xs-12">

            <div class="box">

                <!-- FILTER -->
                <div class="box-header" style="padding-bottom: 20px;">

                    <form action="{{ route('admin.product.index') }}"
                          method="GET">

                        <div class="row">

                            <!-- Search -->
                            <div class="col-md-3">

                                <input type="text"
                                       name="search"
                                       class="form-control"
                                       placeholder="Tên sản phẩm..."
                                       value="{{ request('search') }}">

                            </div>

                            <!-- Category -->
                            <div class="col-md-3">

                                <select name="category_id"
                                        class="form-control">

                                    <option value="">
                                        -- chọn Danh Mục --
                                    </option>

                                    @foreach($categories as $item)

                                        <option value="{{ $item->id }}">

                                            {{ $item->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <!-- Brand -->
                            <div class="col-md-3">

                                <select name="brand_id"
                                        class="form-control">

                                    <option value="">
                                        -- Tất cả thương hiệu --
                                    </option>

                                    @foreach($brands as $brand)

                                        <option value="{{ $brand->id }}"
                                            {{ request('brand_id') == $brand->id ? 'selected' : '' }}>

                                            {{ $brand->name }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            <!-- Button -->
                            <div class="col-md-2">

                                <button type="submit"
                                        class="btn btn-primary btn-block">

                                    <i class="fa fa-filter"></i> Lọc

                                </button>

                            </div>

                            <!-- Refresh -->
                            <div class="col-md-1">

                                <a href="{{ route('admin.product.index') }}"
                                   class="btn btn-default btn-block">

                                    <i class="fa fa-refresh"></i>

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
                                <th>TT</th>
                                <th>Tên SP</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Giá</th>
                                <th>Sản phẩm Hot</th>
                                <th>Trạng thái</th>
                                <th>Người tạo</th>
                                <th class="text-center" width="170">
                                    Hành động
                                </th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($data as $key => $item)

                            <tr class="item-{{ $item->id }}">

                                <!-- STT -->
                              <td>{{ $data->firstItem() + $loop->index }}</td>

                                <!-- NAME -->
                                <td>
                                    {{ substr($item->name, 0, 50) }}
                                </td>

                                <!-- IMAGE -->
                                <td>

                                    @if ($item->image)

                                        <img src="{{asset($item->image)}}"
                                             class="product-image">

                                    @endif

                                </td>

                                <!-- STOCK -->
                                <td>
                                    {{ $item->stock }}
                                </td>

                                <!-- PRICE -->
                                <td>

                                    @if($item->sale > 0)

                                        <span style="color:red; font-weight:bold;">

                                            {{ number_format($item->sale) }} đ

                                        </span>

                                        <br>

                                        <span style="text-decoration: line-through; color:#999;">

                                            {{ number_format($item->price) }} đ

                                        </span>

                                    @else

                                        <span style="font-weight:bold;">

                                            {{ number_format($item->price) }} đ

                                        </span>

                                    @endif

                                </td>

                                <!-- HOT -->
                                <td>
                                    {{ ($item->is_hot == 1) ? 'Có' : 'Không' }}
                                </td>

                                <!-- STATUS -->
                                <td>
                                    {{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}
                                </td>

                                <!-- USER -->
                                <td>
                                    {{ isset($item->user->name) ? $item->user->name : ''}}
                                </td>

                                <!-- ACTION -->
                                <td class="text-center">

                                    <!-- EDIT -->
                                    <a href="{{route('admin.product.edit', ['product' => $item->id])}}"
                                       class="btn btn-info action-btn"
                                       title="Sửa">

                                        <i class="fa fa-pencil"></i>

                                    </a>

                                    <!-- SPECS -->
                                    <a href="{{ route('admin.product.specs', $item->id) }}"
                                       class="btn btn-warning action-btn"
                                       title="Thông số kỹ thuật">

                                        <i class="fa fa-cogs"></i>

                                    </a>

                                    <!-- DELETE -->
                                    <a href="javascript:void(0)"
                                       class="btn btn-danger action-btn"
                                       onclick="destroyProduct({{ $item->id }})"
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