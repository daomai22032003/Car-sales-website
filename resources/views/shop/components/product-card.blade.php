@php
    $specs = $product->specs ? $product->specs->pluck('value','key') : collect();
@endphp

<div class="product-card"
    style="border: 1px solid #f0f0f0; border-radius: 20px; overflow: hidden; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.04); background: white;">

    <!-- IMAGE -->
    <div class="img-container">
        <a href="{{ route('shop.product', ['slug' => $product->slug, 'id' => $product->id]) }}">
            <img src="{{ asset($product->image) }}"
                 style="width:100%; height:220px; object-fit:cover;">
        </a>
    </div>

    <!-- INFO -->
    <div class="info" style="padding:20px;">

        <!-- NAME -->
        <a href="{{ route('shop.product', ['slug' => $product->slug, 'id' => $product->id]) }}"
           style="font-weight:700; color:#1a2a5a; font-size:15px; display:block; margin-bottom:8px;">
            {{ $product->name }}
        </a>

        <!-- PRICE -->
        <div style="margin-bottom:15px;">
            @if($product->sale > 0)
                <div style="color:red; font-weight:bold;">
                    {{ number_format($product->sale,0,",",".") }} đ
                </div>
                <div style="text-decoration:line-through; font-size:14px;">
                    {{ number_format($product->price,0,",",".") }} đ
                </div>
            @else
                <div style="font-weight:bold;">
                    {{ number_format($product->price,0,",",".") }} đ
                </div>
            @endif
        </div>

        <!-- SPECS -->
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:10px; font-size:13px; border-top:1px solid #eee; padding-top:15px;">

            <div>
                <i class="fa fa-user-o"></i>
                {{ isset($specs['seats']) ? $specs['seats'].' chỗ' : 'Đang cập nhật' }}
            </div>

            <div>
                <i class="fa fa-cog"></i>
                {{ $specs['gearbox'] ?? 'Đang cập nhật' }}
            </div>

            <div>
                <i class="fa fa-tint"></i>
                {{ $specs['fuel'] ?? 'Đang cập nhật' }}
            </div>

            <div>
                <i class="fa fa-map-marker"></i>
                TP. HN
            </div>

        </div>

    </div>
</div>