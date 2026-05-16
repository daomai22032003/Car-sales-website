@extends('shop.layouts.main')

@section('content')
<div class="container">
    <h2>Dự tính trả góp</h2>

    @foreach($products as $product)
        <div>
            <a href="{{ url('/tra-gop/'.$product->slug) }}">
                {{ $product->name }}
            </a>
        </div>
    @endforeach
</div>
@endsection