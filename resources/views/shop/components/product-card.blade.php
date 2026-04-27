<div class="product-card"
    style="border: 1px solid #f0f0f0; border-radius: 20px; overflow: hidden; margin-bottom: 30px; box-shadow: 0 5px 20px rgba(0,0,0,0.04); transition: all 0.3s; background: white;">
    <div class="img-container" style="position: relative;">
        <a href="{{ route('shop.product', ['slug' => $product->slug, 'id' => $product->id]) }}">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                style="width: 100%; height: 220px; object-fit: cover;">
        </a>
    </div>
    <div class="info" style="padding: 20px;">
        <a href="{{ route('shop.product', ['slug' => $product->slug, 'id' => $product->id]) }}" class="name"
            style="text-decoration: none; display: block; font-weight: 700; color: #1a2a5a; font-size: 15px; margin-bottom: 8px; height: 36px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; line-height: 1.2;">{{ $product->name }}</a>
        <div class="price" style="color: #b02a2a; font-weight: 800; font-size: 18px; margin-bottom: 15px;">
            {{ number_format($product->sale, 0, ",", ".") }} đ
        </div>
        <div class="specs"
            style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; font-size: 13px; color: #666; border-top: 1px solid #f0f0f0; padding-top: 15px;">
            <div class="spec-item"><i class="fa fa-user-o" style="margin-right: 8px; color: #999;"></i>
                @if(isset($product->category) && str_contains(strtolower($product->category->name), '6-7')) 7 chỗ
                @else Báo Giá @endif
            </div>
            <div class="spec-item"><i class="fa fa-cog" style="margin-right: 8px; color: #999;"></i> Tự động</div>
            <div class="spec-item"><i class="fa fa-tint" style="margin-right: 8px; color: #999;"></i> Xăng</div>
            <div class="spec-item"><i class="fa fa-map-marker" style="margin-right: 8px; color: #999;"></i> TP. HN
            </div>
        </div>
    </div>
</div>