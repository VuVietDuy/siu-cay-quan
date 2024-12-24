<?php
    include "views/admin/partials/header.php"
?>
<div class="d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="m-4 flex-grow-1">
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between">    
                    <h4 class="">Thống kê</h4>
                    <div class="">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-primary border-primary text-white">
                                    <i class="bi bi-calendar-week"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-primary ms-2">
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                            <a href="javascript: void(0);" class="btn btn-primary ms-1">
                                <i class="bi bi-filter"></i>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-sm-6 col-md-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                        <i class="bi bi-people-fill"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Món ăn">Món ăn</h5>
                        <h3 class="mt-3 mb-3">
                            <?= $dashboard->getTotalFood() ?>
                        </h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="bi bi-arrow-up-square-fill"></i> 5.27%</span>
                            <span class="text-nowrap">Since last month</span>  
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6 col-md-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                        <i class="bi bi-receipt"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Đơn hàng">Đơn hàng</h5>
                        <h3 class="mt-3 mb-3">
                            <?= $dashboard->getTotalOrderThisMonth() ?>
                        </h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="bi bi-arrow-down-square-fill"></i> 1.08%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
            <div class="col-sm-6 col-md-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                        <i class="bi bi-currency-dollar"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Doanh thu">Doanh thu</h5>
                        <h3 class="mt-3 mb-3">
                            <?= $dashboard->getTotalRevenueThisMonth()?>
                        </h3>
                        <p class="mb-0 text-muted">
                            <span class="text-danger me-2"><i class="bi bi-arrow-down-square-fill"></i> 7.00%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->

            <div class="col-sm-6 col-md-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                        <i class="bi bi-graph-up"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Bàn">Bàn</h5>
                        <h3 class="mt-3 mb-3">
                            <?= $dashboard->getTotalTable() ?>
                        </h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="bi bi-arrow-up-square-fill"></i> 4.87%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="card p-4">
                    <span class="fs-5 mb-1">Món bán chạy</span>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Tổng bán</th>
                                <!-- <th scope="col">Th?ao tác</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($dashboard->getTopFoodList() as $key => $food) :?>
                            <tr>
                                <td><?= $key ?></td>
                                <td><?= $food['name'] ?></td>
                                <td><?= $food['price'] ?></td>
                                <td><?= $food['total_buy']?></td>
                                <!-- <td>
                                    <button class="btn btn-primary btn-sm me-2">
                                    <i class="bi bi-eye"></i>
                                    </button>
                                </td> -->
                            </tr>
                        <?php endforeach;?>
                        <tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card p-4 h-100 d-flex flex-column">
                    <span class="fs-5 mb-1">Doanh thu tuần này</span>
                    <div class="d-flex flex-grow-1">
                        <div class="d-flex flex-column justify-content-between border-r" style="margin-bottom:24px">
                            <span>1000</span>
                            <span>750</span>
                            <span>500</span>
                            <span>250</span>
                            <span>0</span>
                        </div>
                        <div class="d-flex justify-content-between flex-grow-1">
                            <?php foreach ($dashboard->getDailyRevenueStatistics() as $key => $dailyRevenue) :?>
                                <div style="width:10%;" >
                                    <div class="d-flex align-items-end" style="height:90%">
                                        <div class="bg-brand w-100" style="height:<?= $dailyRevenue['daily_revenue'] / 10000 + 1?>%"></div>
                                    </div>
                                    <div class="text-center"><?= $day = date("d", strtotime($dailyRevenue['day']));?></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>