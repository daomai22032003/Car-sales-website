<div class="box-body">

    {{-- SẢN PHẨM --}}
    <div class="form-group">
        <label>Sản phẩm</label>

        <select name="product_id" class="form-control">

            @foreach($products as $product)
                <option value="{{ $product->id }}"
                    {{ isset($item) && $item->product_id == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach

        </select>
    </div>

    {{-- TÊN MÀU --}}
    <div class="form-group">
        <label>Tên màu</label>

        <input type="text"
                name="color_name"
       class="form-control"
       value="{{ $item->color_name ?? '' }}">
    </div>

    {{-- MÀU --}}
    <div class="form-group">
        <label>Màu</label>

        <input type="color"
               name="color_code"
       value="{{ $item->color_code ?? '#000000' }}"
       style="width:80px; height:34px;">
    </div>

    {{-- GIÁ CỘNG THÊM --}}
    <div class="form-group">
        <label>Giá cộng thêm (VNĐ)</label>

        <input type="number"
              name="extra_price"
       class="form-control"
       value="{{ $item->extra_price ?? 0 }}">
    </div>

    {{-- ẢNH --}}
    <div class="form-group">
        <label>Upload nhiều ảnh</label>

        <input type="file"
               name="images[]"
               multiple
               class="form-control">
    </div>

</div>