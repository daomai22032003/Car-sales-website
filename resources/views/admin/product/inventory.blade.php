@extends('admin.layouts.main')
@section('content')
    <section class="content-header">
        <h1>
            Quản Lý Tồn Kho
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách sản phẩm và số lượng tồn</h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>SKU</th>
                                    <th>Tồn Kho Hiện Tại</th>
                                    <th width="200">Cập Nhật Nhanh</th>
                                    <th>Trạng Thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr id="row-{{ $item->id }}">
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset($item->image) }}" width="50" height="50"
                                                    style="object-fit: cover; border-radius: 4px;">
                                            @endif
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sku }}</td>
                                        <td>
                                            <span class="label {{ $item->stock < 5 ? 'label-danger' : 'label-success' }}"
                                                id="stock-val-{{ $item->id }}">
                                                {{ $item->stock }}
                                            </span>
                                            @if($item->stock < 5)
                                                <small class="text-danger" style="display: block; margin-top: 5px;"><i
                                                        class="fa fa-warning"></i> Sắp hết hàng</small>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="input-group input-group-sm">
                                                <input type="number" class="form-control" id="input-stock-{{ $item->id }}"
                                                    value="{{ $item->stock }}">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-info btn-flat"
                                                        onclick="updateStock({{ $item->id }})">Lưu</button>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            {{ ($item->is_active == 1) ? 'Đang bán' : 'Ngừng bán' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('my_javascript')
    <script>
        function updateStock(id) {
            var stock = $('#input-stock-' + id).val();

            $.ajax({
                url: '{{ route("admin.product.updateStock") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    stock: stock
                },
                success: function (res) {
                    if (res.status) {
                        $('#stock-val-' + id).text(stock);
                        if (stock < 5) {
                            $('#stock-val-' + id).removeClass('label-success').addClass('label-danger');
                        } else {
                            $('#stock-val-' + id).removeClass('label-danger').addClass('label-success');
                        }
                        alert('Cập nhật tồn kho thành công!');
                    } else {
                        alert('Có lỗi xảy ra!');
                    }
                },
                error: function () {
                    alert('Lỗi kết nối server!');
                }
            });
        }
    </script>
@endsection