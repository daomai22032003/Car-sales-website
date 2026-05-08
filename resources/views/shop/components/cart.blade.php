@php
    $products = [];
    $totalPrice = 0;
    $totalQty = 0;
    $discount = 0;
    $coupon = "";

    if (Auth::check()) {
        $cartItems = Auth::user()->cartItems()->with('product')->get();
        foreach ($cartItems as $item) {

             $price = ($item->product->sale > 0)
                ? $item->product->sale
                : $item->product->price;

            $products[] = [
                'qty' => $item->quantity,
                'price' => $price,
                'item' => $item->product
            ];

$totalPrice += $item->quantity * $price;
            $totalQty += $item->quantity;
        }
        // Handle coupon from session if still using session for coupons
        $coupon = session('coupon_code', '');
        $discount = session('discount_amount', 0);
    } else {
        $rawCart = session('cart');
        if ($rawCart && $rawCart instanceof \App\Models\Cart) {
            $products = $rawCart->products;
            $totalPrice = $rawCart->totalPrice;
            $totalQty = $rawCart->totalQty;
            $discount = $rawCart->discount;
            $coupon = $rawCart->coupon;
        }
    }
    $payment = $totalPrice - $discount;
@endphp

@if(count($products) > 0)
<style>
    
</style>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
        <table class="table " id="cart-summary" style="border-collapse: collapse; margin-bottom: 0;">
            <thead>
                <tr style="background: #fcfcfc;">
                    <th class="text-center" style="width: 55%; padding: 10px;">Sản phẩm</th>
                    <th class="text-center" style="width: 10%; border-left: 1px solid #ddd;">Số lượng</th>
                    <th class="text-right" style="width: 30%; border-left: 1px solid #ddd; padding-right: 20px;">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    @php
                        $price = ($product['item']->sale > 0) ? $product['item']->sale : $product['item']->price;
                    @endphp
                    <tr>
                        <!-- Cột Sản phẩm: Ép padding cực nhỏ để khung co lại -->
                        <td style="padding: 5px 15px; vertical-align: middle;">
                            <div style="display: flex; align-items: center;">
                                <!-- Khối ảnh: Fix cứng chiều cao nếu cần để khung không bị giãn -->
                                <div style="width: 180px; flex-shrink: 0; margin-right: 20px; display: flex; align-items: center;">
                                    <img src="{{ asset($product['item']->image) }}" 
                                         alt="{{ $product['item']->name }}" 
                                         style="width: 100%; height: auto; display: block; border-radius: 4px;">
                                </div>
                                <!-- Khối thông tin: Dùng line-height chặt chẽ -->
                                <div style="line-height: 1.2;">
                                    <h4 style="margin: 0 0 3px 0; font-weight: bold; color: #333; font-size: 15px;">
                                        {{ $product['item']->name }}
                                    </h4>
                                    <p style="margin: 0; color: #666; font-size: 12px;">SKU: {{ $product['item']->sku }}</p>
                                    <div style="margin-top: 5px; font-size: 11px; color: #999;">
                                        <span style="display: block;">• Động cơ: Tăng áp 1.5L</span>
                                        <span style="display: block;">• Tình trạng: Mới 100%</span>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <!-- Cột Số lượng: Triệt tiêu padding thừa -->
                        <td class="text-center" style="vertical-align: middle; border-left: 1px solid #ddd; padding: 0;">
                            <input min="1" class="form-control text-center item-qty" 
                                   style="width: 60px; height: 30px; padding: 0; display: inline-block; font-weight: bold;"
                                   data-id="{{ $product['item']->id }}"
                                   data-num="{{ $product['qty'] }}" 
                                   type="number" name="qty" value="{{ $product['qty'] }}">
                        </td>

                        <!-- Cột Thành tiền: Triệt tiêu padding thừa -->
                        <td class="text-right" style="vertical-align: middle; border-left: 1px solid #ddd; padding: 0 20px 0 0;">
                            <div style="display: flex; justify-content: flex-end; align-items: center;">
                                <span style="font-weight: bold; color: #333; font-size: 16px; margin-right: 15px;">
                                    {{ number_format($product['qty'] * $price, 0, ",", ".") }}đ
                                </span>
                                <a data-id="{{ $product['item']->id }}" href="javascript:void(0)" 
                                   class="remove-to-cart" style="color: #666;" title="Xóa">
                                    <i class="fa fa-trash-o" style="font-size: 16px;"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
           <tfoot>
    <tr>
        <td colspan="2" class="text-right" style="padding: 5px 10px; color: #888; font-size: 13px;">
            Tạm tính:
        </td>
        <td class="text-right" style="padding: 5px 20px 5px 0; font-weight: bold;">
            {{ number_format($totalPrice, 0, ",", ".") }} đ
        </td>
    </tr>

    <tr>
        <td colspan="2" class="text-right" style="padding: 5px 10px; color: #888; font-size: 13px;">
            Giảm giá:
        </td>
        <td class="text-right" style="padding: 5px 20px 5px 0; color: #28a745;">
            - {{ number_format($discount, 0, ",", ".") }} đ
        </td>
    </tr>

    <tr>
        <td colspan="2" class="text-right" style="padding: 10px; font-weight: bold;">
            Thanh toán:
        </td>
        <td class="text-right" style="padding: 10px 20px 10px 0; color: #e3007b; font-size: 18px; font-weight: bold;">
            {{ number_format($payment, 0, ",", ".") }} đ
        </td>
    </tr>
    
</tfoot>
        </table>
    </div>
</div>
    @section('my_javascript')
        <script type="text/javascript">
            $(function () {
                // xóa sản phẩm khỏi giỏ hàng
                $(document).on("click", '.remove-to-cart', function () {
                    var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng ?");
                    if (result) {
                        var product_id = $(this).attr('data-id');
                        $.ajax({
                            url: '/dat-hang/xoa-sp-gio-hang/' + product_id,
                            type: 'get',
                            data: {
                                id: product_id
                            }, // dữ liệu truyền sang nếu có
                            dataType: "HTML", // kiểu dữ liệu trả về
                            success: function (response) {
                                $('#my-cart').html(response);
                            },
                            error: function (e) { // lỗi nếu có
                                console.log(e.message);
                            }
                        });
                    }
                });

                // cập nhật số lượng giỏ hàng
                //$('.item-qty').change(function () {
                $(document).on("change", '.item-qty', function () {
                    var product_id = $(this).attr('data-id');
                    var before_qty = $(this).attr('data-num'); // số lượng trước khi thay đổi
                    var qty = $(this).val();

                    if (qty <= 0) {
                        alert('Nhập số lượng phải lớn hơn 0');
                        $(this).val(before_qty); // set lại giá trị
                        return false;
                    }

                    $.ajax({
                        url: '/dat-hang/cap-nhat-gio-hang',
                        type: 'get',
                        data: {
                            id: product_id,
                            qty: qty
                        }, // dữ liệu truyền sang nếu có
                        dataType: "json", // kiểu dữ liệu trả về
                        success: function (response) {
                            console.log(response);
                            // success
                            if (response.status == true) {
                                $('#my-cart').html(response.data);
                            }
                        },
                        error: function (e) { // lỗi nếu có
                            console.log(e.message);
                        }
                    });
                });
            })
        </script>
    @endsection
@else
    <style>
        .buyother {
            display: block;
            overflow: hidden;
            background: #fff;
            line-height: 40px;
            text-align: center;
            margin: 15px auto;
            width: 300px;
            font-size: 14px;
            color: #288ad6;
            font-weight: 600;
            text-transform: uppercase;
            border: 1px solid #288ad6;
            border-radius: 4px;
            
        }      
    </style>
    <h3 class="text-center"><i class="fa fa-opencart"></i>Bạn chưa có sản phẩm nào trong giỏ hàng</h3>
    <a href="/" class="buyother"><i class="fa fa-chevron-left"></i> Về trang chủ</a>
@endif