<?php
    include "views/admin/partials/header.php"
?>
<div class="d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card p-4 flex-grow-1 " style="margin: 24px 524px 24px 24px; ">
        
    </div>
    <div class="order-detail-container p-2">
        <!-- Hiển thị thông tin order -->
        <div class="">
            Đơn hàng #<?= $order->id ?>
        </div>
        <div class="card-body">
            <p>Bàn số: <?= $order->table_number ?></p>
            <p>Tổng tiền: <?= number_format($order->total_price, 2) ?> VND</p>
            <p>Trạng thái: <?= ucfirst($order->status) ?></p>

            <h5>Chi tiết món ăn:</h5>
            <ul>
                <!-- Lặp qua danh sách món ăn và hiển thị -->
                <?php foreach ($order->items as $item): ?>
                    <li>
                        <div>
                            Món ăn ID: <?= $item['food_id'] ?> - 
                        </div>
                        <div>

                        Món ăn ID: <?= $item['name'] ?> - 
                        </div>

                        Số lượng: <?= $item['quantity'] ?> - 
                        Giá: <?= number_format($item['price'], 2) ?> VND
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>