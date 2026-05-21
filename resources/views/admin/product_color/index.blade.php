@extends('admin.layouts.main')

@section('content')

<section class="content-header">
    <h1>Quản lý màu xe</h1>
</section>

<section class="content">

    <!-- 🔥 FILTER -->
    <div class="box">

        <div class="box-header with-border">

            <form method="GET" class="form-inline pull-right">

                <input type="text"
                       name="color"
                       value="{{ request('color') }}"
                       class="form-control input-sm"
                       style="width:160px;"
                       placeholder="Màu (đỏ, đen...)">

                <input type="text"
                       name="keyword"
                       value="{{ request('keyword') }}"
                       class="form-control input-sm"
                       style="width:160px;"
                       placeholder="Tên xe">

                <button class="btn btn-primary btn-sm">
                    <i class="fa fa-search"></i> Lọc
                </button>

                @if(request('color') || request('keyword'))
                    <a href="{{ url()->current() }}"
                       class="btn btn-default btn-sm">
                        Reset
                    </a>
                @endif

            </form>

        </div>

        <!-- 🔥 TABLE -->
        <div class="box-body">

            <table class="table table-bordered table-hover">

                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Số màu</th>
                        <th>Danh sách màu</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($items as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            <b>{{ $item->name }}</b>
                        </td>

                        <td>
                            <span class="label label-primary">
                                {{ $item->colors->count() }} màu
                            </span>
                        </td>

                        <td>
                            <div style="display:flex; flex-wrap:wrap; gap:5px; max-width:250px;">

                                @foreach($item->colors as $color)
                                    <span title="{{ $color->color_name }}"
                                          style="
                                            width:22px;
                                            height:22px;
                                            border-radius:50%;
                                            background:{{ $color->color_code }};
                                            border:1px solid #ccc;
                                            display:inline-block;
                                          ">
                                    </span>
                                @endforeach

                            </div>
                        </td>

                        <td>
                            <a href="{{ route('admin.product-color.show', $item->id) }}"
                               class="btn btn-primary btn-sm">
                                Quản lý màu
                            </a>
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

        </div>

    </div>

</section>

@endsection