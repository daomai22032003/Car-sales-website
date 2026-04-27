@extends('admin.layouts.main')
@section('content')
    <style>
        tr td:first-child {
            max-width: 250px
        }

        .price {
            color: red
        }
    </style>
    <section class="content-header">
        <h1>
            Danh Sách Đơn Hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"></i> Trang chủ</a></li>
            <li>Danh Sách Đơn Hàng</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <form action="{{ route('admin.order.index') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="tu-khoa" class="form-control" placeholder="Mã ĐH, Tên, SĐT..."
                                        value="{{ $filter['keyword'] ?? '' }}">
                                </div>
                                <div class="col-md-3">
                                    <select name="status" class="form-control">
                                        <option value="">-- Trạng thái ĐH --</option>
                                        @foreach($order_status as $st)
                                            <option value="{{ $st->id }}" {{ (isset($filter['status']) && $filter['status'] == $st->id) ? 'selected' : '' }}>
                                                {{ $st->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="payment_status" class="form-control">
                                        <option value="">-- Trạng thái Cọc --</option>
                                        <option value="0" {{ (isset($filter['payment_status']) && $filter['payment_status'] === '0') ? 'selected' : '' }}>Chưa cọc</option>
                                        <option value="1" {{ (isset($filter['payment_status']) && $filter['payment_status'] === '1') ? 'selected' : '' }}>Chờ xác nhận</option>
                                        <option value="2" {{ (isset($filter['payment_status']) && $filter['payment_status'] === '2') ? 'selected' : '' }}>Đã cọc</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Lọc</button>
                                    <a href="{{ route('admin.order.index') }}" class="btn btn-default">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="text-center">TT</th>
                                    <th class="text-center">Ngày</th>
                                    <th class="text-center">Mã ĐH</th>
                                    <th style="max-with:200px">Trạng thái</th>
                                    <th style="max-with:200px">Cọc</th>
                                    <th>Họ tên</th>
                                    <th>ĐT</th>
                                    <th>Email</th>
                                    <th>Tiền cọc</th>
                                    <th>Tổng tiền</th>
                                    <th class="text-center"></th>
                                </tr>
                            </tbody>
                            <!-- Lặp một mảng dữ liệu pass sang view để hiển thị -->
                            @foreach($data as $key => $item)
                                <tr class="item-{{ $item->id }}"> <!-- Thêm Class Cho Dòng -->
                                    <td class="text-center">{{ $key }}</td>
                                    <td class="text-center">{{ $item->created_at }}</td>
                                    <td class="text-center">{{ $item->code }}</td>
                                    <td>
                                        @if ($item->order_status_id === 1)
                                            <span class="label label-info">Mới</span>
                                        @elseif ($item->order_status_id === 2)
                                            <span class="label label-warning">Đang XL</span>
                                        @elseif ($item->order_status_id === 3)
                                            <span class="label label-success">Hoàn thành</span>
                                        @else
                                            <span class="label label-danger">Hủy</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->payment_vnpay_status === 0)
                                            <span class="label label-info">Chưa cọc</span>
                                        @elseif ($item->payment_vnpay_status === 1)
                                            <span class="label label-warning">Chờ xác nhận</span>
                                        @else
                                            <span class="label label-success">Đã cọc</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->fullname }}
                                    </td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="price">{{ number_format($item->payment_vnpay) }} đ</td>
                                    <td class="price">{{ number_format($item->total) }} đ</td>
                                    <td>
                                        <a href="{{route('admin.order.edit', ['order' => $item->id])}}">
                                            <span title="Edit" type="button" class="btn btn-flat btn-primary">Chi tiết</span>
                                        </a>&nbsp;
                                    </td>
                            @endforeach
                        </table>
                    </div>
                    <!-- /.box-body -->

                </div>
                <!-- /.box -->
                {{ $data->appends(request()->query())->links() }}
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection