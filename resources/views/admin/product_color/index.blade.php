@extends('admin.layouts.main')

@section('content')

<section class="content-header">
    <h1>Quản lý màu xe</h1>
</section>

<section class="content">

    <div class="box">

        <div class="box-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Sản phẩm</th>

                        <th>Số màu</th>

                        <th>Danh sách màu</th>

                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($items as $item)

                    <tr>

                        <td>{{ $item->id }}</td>

                        <td>{{ $item->name }}</td>

                        <td>

                            {{ $item->colors->count() }} màu

                        </td>

                        <td>

                            @foreach($item->colors as $color)

                                <span style="
                                    display:inline-block;
                                    width:25px;
                                    height:25px;
                                    border-radius:50%;
                                    background:{{ $color->color_code }};
                                    border:1px solid #ccc;
                                    margin-right:5px;
                                "></span>

                            @endforeach

                        </td>

                        <td>

                            <a href="{{ route('admin.product-color.show',$item->id) }}"
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