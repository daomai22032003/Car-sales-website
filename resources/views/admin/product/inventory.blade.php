@extends('admin.layouts.main')

@section('content')

<style>
    .box {
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    }

    .box-header {
        padding: 12px 15px;
    }

    .table > tbody > tr > td {
        vertical-align: middle !important;
    }

    /* 🔥 FILTER NGANG */
    .filter-form {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: nowrap;
    }

    .filter-form input,
    .filter-form select {
        height: 32px !important;
        font-size: 13px;
        min-width: 150px;
    }

    .product-img {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 6px;
        border: 1px solid #eee;
    }

    .stock-label {
        font-size: 12px;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .stock-ok { background: #00a65a; color: #fff; }
    .stock-low { background: #f39c12; color: #fff; }
    .stock-out { background: #dd4b39; color: #fff; }
    /* PAGINATION */

.pagination{
    margin:0;
}

.pagination > li > a,
.pagination > li > span{
    width:38px;
    height:38px;
    line-height:38px;

    padding:0;
    text-align:center;

    border:1px solid #ddd;
    background:#fff;
    color:#666;

    font-size:14px;
    font-weight:600;
}

.pagination > li > a:hover{
    background:#f5f5f5;
}

.pagination > .active > span{
    background:#1e88e5 !important;
    border-color:#1e88e5 !important;
    color:#fff !important;
}

.pagination > .disabled > span{
    background:#fafafa;
    color:#bbb;
}
</style>

<section class="content-header">
    <h1>Quản Lý Tồn Kho</h1>
</section>

<section class="content">

    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">

                <!-- 🔥 HEADER -->
                <div class="box-header with-border">

                    <h3 class="box-title">Danh sách tồn kho sản phẩm</h3>

                    <!-- 🔎 FILTER -->
                    <div class="pull-right">

                        <form method="GET" class="filter-form">

                            <!-- search -->
                            <input type="text"
                                   name="search"
                                   value="{{ request('search') }}"
                                   class="form-control input-sm"
                                   placeholder="Tên / SKU">

                            <!-- stock -->
                            <select name="stock" class="form-control input-sm">
                                <option value="">Tất cả</option>
                                <option value="ok" {{ request('stock')=='ok'?'selected':'' }}>Còn hàng</option>
                                <option value="low" {{ request('stock')=='low'?'selected':'' }}>Sắp hết</option>
                                <option value="out" {{ request('stock')=='out'?'selected':'' }}>Hết hàng</option>
                            </select>

                            <!-- sort -->
                            <select name="sort" class="form-control input-sm">
                                <option value="asc" {{ request('sort')=='asc'?'selected':'' }}>Tăng dần</option>
                                <option value="desc" {{ request('sort')=='desc'?'selected':'' }}>Giảm dần</option>
                            </select>

                            <button class="btn btn-primary btn-sm">
                                Lọc
                            </button>

                            @if(request()->filled('search') || request()->filled('stock') || request()->filled('sort'))
                                <a href="{{ url()->current() }}" class="btn btn-default btn-sm">
                                    Reset
                                </a>
                            @endif

                        </form>

                    </div>

                </div>

                <!-- 📦 TABLE -->
                <div class="box-body table-responsive no-padding">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>SKU</th>
                                <th>Tồn kho</th>
                                <th>Cập nhật</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>

                        <tbody>

                        @foreach($data as $item)

                            <tr>

                                <td>
                                    {{ $data->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    @if($item->image)
                                        <img src="{{ asset($item->image) }}"
                                             class="product-img">
                                    @endif
                                </td>

                                <td><b>{{ $item->name }}</b></td>

                                <td>{{ $item->sku }}</td>

                                <td>
                                    <span id="stock-val-{{ $item->id }}"
                                          class="label stock-label
                                          {{ $item->stock == 0 ? 'stock-out' : ($item->stock < 5 ? 'stock-low' : 'stock-ok') }}">
                                        {{ $item->stock }}
                                    </span>
                                     {{-- 🔥 THÔNG BÁO --}}
                                    @if($item->stock == 0)
                                        <small class="text-danger" style="display:block;margin-top:5px;">
                                            <i class="fa fa-times-circle"></i> Hết hàng
                                        </small>

                                    @elseif($item->stock < 5)
                                        <small class="text-warning" style="display:block;margin-top:5px;">
                                            <i class="fa fa-warning"></i> Sắp hết hàng
                                        </small>
                                    @endif
                                </td>

                                <td>
                                    <div class="input-group input-group-sm">

                                        <input type="number"
                                               min="0"
                                               class="form-control"
                                               id="input-stock-{{ $item->id }}"
                                               value="{{ $item->stock }}">

                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-flat"
                                                    onclick="updateStock({{ $item->id }})">
                                                Lưu
                                            </button>
                                        </span>

                                    </div>
                                </td>

                                <td>
                                    {{ $item->is_active ? 'Đang bán' : 'Ngừng bán' }}
                                </td>

                            </tr>

                        @endforeach

                        </tbody>

                    </table>

                </div>

                <!-- 📄 PAGINATION -->
              <div class="box-footer text-left" style="margin-top:20px;">
                    {{ $data->appends(request()->all())->links() }}
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
        success: function(res) {

            if (res.status) {

                $('#stock-val-' + id).text(stock);

                $('#stock-val-' + id)
                    .removeClass()
                    .addClass(
                        'label stock-label ' +
                        (stock == 0 ? 'stock-out' : (stock < 5 ? 'stock-low' : 'stock-ok'))
                    );

            }
        }
    });

}
</script>

@endsection