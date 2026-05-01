@extends('admin.layouts.main')
@section('content')
    <style>
        tr td:first-child {
            max-width: 250px
        }
    </style>
    <section class="content-header">
        <h1>
            Danh Sách Sản Phẩm <a href="{{route('admin.product.create')}}" class="btn btn-flat btn-info"><i
                    class="fa fa-plus"></i> Thêm SP</a>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header" style="padding-bottom: 20px;">
                        <form action="{{ route('admin.product.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" name="search" class="form-control" placeholder="Tên sản phẩm..."
                                        value="{{ request('search') }}">
                                </div>
                                <div class="col-md-3">
                                    <select name="category_id" class="form-control">
                                        <option value="">-- chọn Danh Mục --</option>
                                        @foreach($categories as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="brand_id" class="form-control">
                                        <option value="">-- Tất cả thương hiệu --</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ request('brand_id') == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-filter"></i>
                                        Lọc</button>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('admin.product.index') }}" class="btn btn-default btn-block"><i
                                            class="fa fa-refresh"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>TT</th>
                                    <th style="max-with:200px">Tên SP</th>
                                    <th>Hình ảnh</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    <th>Sản phẩm Hot</th>
                                    <th>Trạng thái</th>
                                    <th>Người tạo</th>
                                    <th class="text-center">Hành động</th>
                                </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td>{{ $key }}</td>
                                    <td>{{ substr($item->name, 0, 50) }}</td>
                                    <td>
                                        @if ($item->image) <!-- Kiểm tra hình ảnh tồn tại -->
                                            <img src="{{asset($item->image)}}" width="50" height="50">
                                        @endif
                                    </td>
                                    <td>{{ $item->stock }}</td>
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
                                    {{-- <td>{{ $item->price }}</td>--}}
                                    <td>{{ ($item->is_hot == 1) ? 'Có' : 'Không' }}</td>
                                    <td>{{ ($item->is_active == 1) ? 'Hiển thị' : 'Ẩn' }}</td>
                                    <td>{{ isset($item->user->name) ? $item->user->name : ''}}</td>
                                    <td class="text-center">
                                        <a href="{{route('admin.product.edit', ['product' => $item->id])}}"
                                            class="btn btn-flat btn-info">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- Thêm sự kiện onlick cho nút xóa -->
                                        <a href="javascript:void(0)" class="btn btn-flat btn-danger"
                                            onclick="destroyProduct({{ $item->id }})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
                {{ $data->links() }}
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection