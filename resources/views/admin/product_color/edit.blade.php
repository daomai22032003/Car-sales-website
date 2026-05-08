@extends('admin.layouts.main')

@section('content')

<section class="content-header">
    <h1>Cập nhật màu xe</h1>
</section>

<section class="content">

    <div class="box box-primary">

        <form action="{{ route('admin.product-color.update',$item->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @include('admin.product_color.form')

            <div class="box-footer">

                <button type="submit"
                        class="btn btn-primary">

                    Cập nhật

                </button>

            </div>

        </form>

    </div>

</section>

@endsection