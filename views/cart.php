<link rel="stylesheet" href="/assets/styles/cart.css">
<div class="bg-brandlight h-100 d-flex flex-column">
    <div class="px-3 py-3 bg-brandlight d-flex justify-content-between align-items-center">
        <button id="backBtn" class="btn border rounded-circle d-flex justify-content-center align-items-center fs-4" style="width:38px; height:38px">
            <i class="bi bi-chevron-left"></i>
        </button>
        <h1 class="m-0 fs-3">Giỏ hàng</h1>
        <a href="/menu" class="btn border rounded-circle d-flex justify-content-center align-items-center fs-4" style="width:38px; height:38px">
            <i class="bi bi-x-lg"></i>
        </a>
    </div>
    <form class="flex-grow-1" action="/orders" method="post">
        <div class="p-3 rounded-t-5 bg-white h-100">
            <?php if (!empty($cart)): ?>
        
            <?php $totalPrice = 0; ?>
            <?php foreach ($cart as $item): ?>
                <div class="mb-3 bg-brandlight p-3 rounded-4">
                    <div class="d-flex gap-3">
                        <img class="cart-item-image" src="<?= $item['image_url'] ?>" alt="">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold fs-5"><?= htmlspecialchars($item['name']) ?></div>
                                <a class="btn btn-outline-danger" href="/cart/remove?food_id=<?= $item['id'] ?>">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </div>
                            <div>
                                <p class="text-gray mb-1">Khong hanh</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-bold"><?= number_format($item['price']) ?></div>

                                <div class="btn-group border">
                                    <button  type="button" class="btn d-flex justify-content-center align-items-center">
                                        <i class="bi bi-dash"></i>
                                    </button>
                                    <input class="btn w-4 px-0" type="text" value="<?= $item['quantity'] ?>">
                                    <button type="button" class="btn d-flex justify-content-center align-items-center">
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <?php $totalPrice += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>
            <h5>Tổng cộng: <?= number_format($totalPrice) ?> VND</h3>
            <div>
                <div class="">
                    <button type="submit" class="btn btn-primary w-100">Đặt món</button>
                </div>
            </div>
            <?php else: ?>
                <p>Giỏ hàng của bạn đang trống!</p>
            <?php endif; ?>
        </div>
    </form>
</div>
<script src="/assets/javascript/cart.js"></script>

<?php include('views/partials/navbar.php')?>
