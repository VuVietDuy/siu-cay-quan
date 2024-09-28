
<div class="px-3 py-2 bg-white">
    <h2 class="mb-0">Giỏ hàng</h2>
</div>
<form action="/orders" method="post">

    <div class="p-4">
        <?php if (!empty($cart)): ?>
    
        <?php $totalPrice = 0; ?>
        <?php foreach ($cart as $item): ?>
            <div class="mb-4">
                <div class="d-flex justify-content-between mb-2">
                    <div class="fw-bold fs-5"><?= htmlspecialchars($item['name']) ?></div>
                    <div class="fw-bold"><?= number_format($item['price']) ?></div>
                </div>
                <div>
                    <p class="text-gray mb-1">Khong hanh</p>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-sm text-orange" href="/cart/remove?food_id=<?= $item['id'] ?>">Xóa</a>
                    <div class="btn-group border">
                        <button  class="btn d-flex justify-content-center align-items-center">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input class="btn w-4 px-0" type="text" value="<?= $item['quantity'] ?>">
                        <button class="btn d-flex justify-content-center align-items-center">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php $totalPrice += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>
        <h5>Tổng cộng: <?= number_format($totalPrice) ?> VND</h3>
        <div>
    
        </div>
        <?php else: ?>
            <p>Giỏ hàng của bạn đang trống!</p>
        <?php endif; ?>
        <div class="">
            <button type="submit" class="btn btn-primary w-100">Đặt món</button>
        </div>
    </div>
</form>
<?php include('views/partials/navbar.php')?>
