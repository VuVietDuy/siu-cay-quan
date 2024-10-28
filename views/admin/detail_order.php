<?php
    include "views/admin/partials/header.php"
?>
<link rel="stylesheet" href="/assets/styles/detail_order.css">
<div class="d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="flex-grow-1 " style="margin: 24px 524px 24px 24px; ">
        <div class="menu-container container m-auto mt-4 mb-5 row g-3">
            <?php foreach ($foods as $key => $food): ?>
                <div class="col-12 col-lg-3 col-sm-6">
                    <a href="/menu/item?table=<?php echo $table; ?>&food=<?php echo $food->getId(); ?>">
                    <div class="card w-100">
                        <div class="ratio ratio-4x3">
                        <img class="card-img-top object-fit-cover" src="<?php echo $food->getImageUrl()?>" alt="">
                        </div>
                        <div class="card-body p-2">
                        <h5 class="card-title fs-6">
                            <?php echo $food->getName()?>
                        </h5>
                        <div>
                            <span class="text-info-emphasis fs-6">
                            <?php echo number_format($food->getPrice(), 0) ?>
                            </span>
                        </div>
                        </div>
                    </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="order-detail-container p-4">
        <h2 class="fs-3 fw-medium">
            Đơn hàng #<?= $order->id ?>
        </h2>
        <div class="card-body">
            <p class="fs-4">Bàn số: <?= $order->getTableId() ?></p>
            <p>Trạng thái: <?= ucfirst($order->status) ?></p>

            <div class="">
                <!-- Lặp qua danh sách món ăn và hiển thị -->
                <?php foreach ($order->items as $item): ?>
                <div class="mb-3 bg-brandlight p-3 rounded-4">
                    <div class="d-flex gap-3">
                        <img class="order-item-image" src="<?= $item['image_url'] ?>" alt="">
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
            </div>
            <div class="">
                <hr>
                <div class="px-3 d-flex justify-content-between">
                    <span class="fw-medium">Tổng:</span>
                    <span id="totalPrice" class="fw-medium text-success">
                        <?= number_format($order->total_price, 2) ?> đ
                    </span>
                </div>
                <div class="d-flex px-3 py-2 g-2">
                    <div class="flex-grow-1">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#payModal" class="btn btn-success w-100" > 
                        <?= $order->getPaymentStatus() == 'paid' ? "Đã thanh toán" : "Thanh toán"?>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="payModal" aria-labelledby="payModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/orders/pay" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Xác nhận thanh toán</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input class="d-none" type="number" value="<?= $order->getId() ?>" name="order_id">
                    <div class="d-flex justify-content-between">
                        <span class="fw-medium">Tổng:</span>
                        <span id="totalPrice" class="fw-medium text-success">
                            <?= number_format($order->total_price, 2) ?> đ
                        </span>
                    </div>
                    <hr>
                    <select name="payment_method" id="" class="form-select" default="cash">
                        <option value="cash">Tiền mặt</option>
                        <option value="bank_tranfer">Chuyển khoản</option>
                        <option value="credit_card">Quẹt thẻ</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Xác nhận thanh toán</button>
                </div>
            </div>
        </form>

    </div>
</div>