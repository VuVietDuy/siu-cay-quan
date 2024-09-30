<?php
    include "views/admin/partials/header.php";
?>

<div class="mh-50 d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="m-4 flex-grow-1">
        <div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">    
                    <h4 class="">Orders</h4>
                    <div class="">
                        <form class="d-flex flex-grow-1">
                            <a href="javascript: void(0);" class="btn btn-primary ms-2 d-flex">
                                <span class="text-nowrap"> Chờ món</span>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-light ms-2 d-flex">
                                <span class="text-nowrap"> Chờ thanh toán</span>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-light ms-2 d-flex">
                                <span class="text-nowrap"> Đã thanh toán</span>
                            </a>
                            <div class="input-group  ms-2">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="bi bi-calendar-week"></i>
                                </span>
                            </div>
                            <a class="btn btn-success text-nowrap ms-2">
                                <i class="bi bi-plus"></i>  
                                Đặt món
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <?php if (!empty($orders)): ?>
            <?php foreach ($orders as $order): ?>
                <div class="col-sm-2 col-md-4 col-lg-3 mb-3">
                    <a href="/admin/orders/detail?id=<?php echo $order->id?>">
                        <div class="bg-orange rounded overflow-hidden">
                            <div class="px-2 py-1 d-flex justify-content-between bg-gray">
                                <p class="m-0">Ban trong</p>
                                <i class="bi bi-three-dots-vertical"></i>
                            </div>
                            <div class="bg-lightgray p-2 h-4">
                                <p>TABLE <?php $order->table_number?></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
    </div>
</div>