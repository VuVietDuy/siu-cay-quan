<div class="h-100 bg-brandlight">
    <div class="px-3 py-3 bg-brandlight d-flex justify-content-between align-items-center">
        <button id="backBtn" class="btn border rounded-circle d-flex justify-content-center align-items-center fs-4" style="width:38px; height:38px">
            <i class="bi bi-chevron-left"></i>
        </button>
        <h1 class="m-0 fs-3">Lịch sử</h1>
        <a href="/menu" class="btn border rounded-circle d-flex justify-content-center align-items-center fs-4" style="width:38px; height:38px">
            <i class="bi bi-x-lg"></i>
        </a>
    </div>
    <div class="p-3 rounded-t-5 bg-white h-100">
    <?php 
    foreach ($orders as $order) :
        if ($order) {
    ?>
        
        <div class="">
            <h2 class="fs-4 fw-medium">
                Đơn hàng #<?= $order->id ?>
            </h2>
            <div class="card-body">
            <span class="badge <?= $order->getStatus() === 'pending' ? "bg-primary" : "bg-success" ?> mb-2"><?= $order->getStatus() === 'pending' ? "Đang chờ" : "Đã phục vụ" ?></span>

            <div class="">
                <!-- Lặp qua danh sách món ăn và hiển thị -->
                <?php foreach ($order->items as $item): ?>
                <div class="mb-3 bg-brandlight p-3 rounded-4">
                    <div class="d-flex gap-3">
                        <img class="image-box" src="<?= $item['image_url'] ?>" alt="">
                        <div class="flex-grow-1">
                            <div class="d-flex justify-content-between mb-2">
                                <div class="fw-bold fs-5"><?= htmlspecialchars($item['name']) ?></div>
                            </div>
                            <div>
                                <p class="text-gray mb-1">Khong hanh</p>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="fw-bold"><?= number_format($item['price']) ?></div>

                                <div class="btn-group border">
                                    <input class="btn w-4 px-0" type="text" value="<?= $item['quantity'] ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <?php $totalPrice += $item['price'] * $item['quantity']; ?>
                <?php endforeach; ?>
            </div>
            <div class="">
                <div class="d-flex justify-content-between">
                    <span class="fw-medium">Tổng:</span>
                    <span id="totalPrice" class="fw-medium text-success">
                        <?= number_format($order->total_price, 2) ?> đ
                    </span>
                </div>
                <div class="d-flex py-2 g-2">
                    <div class="flex-grow-1">
                        <button type="button" data-bs-toggle="modal" data-bs-target="#payModal" class="btn btn-outline-secondary w-100"> 
                            Hủy
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
    <?php } endforeach; ?>
</div>
</div>

<?php include('views/partials/navbar.php')?>
