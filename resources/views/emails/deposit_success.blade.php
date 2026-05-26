<h2>Xin chào {{ $order->fullname }}</h2>

<p>
Chúng tôi đã nhận được tiền đặt cọc của bạn.
</p>

<hr>

<p>
<b>Mã đơn:</b>
{{ $order->code }}
</p>

<p>
<b>Số tiền cọc:</b>
{{ number_format($order->payment_vnpay) }} đ
</p>

<p>
Trạng thái: Đã thanh toán cọc
</p>

<p>
Cảm ơn quý khách.
</p>