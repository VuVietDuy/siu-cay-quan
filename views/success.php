<h2>Order thành công!</h2>

<p>Cảm ơn bạn, <?= htmlspecialchars($order['customer_name']) ?>. Order của bạn đã được ghi nhận.</p>
<p>Mã Order: <?= $order['id'] ?></p>
<p>Tổng tiền: <?= number_format($order['total_amount']) ?> VND</p>

<a href="/menu">Quay lại menu</a>
