<?php
    include "views/admin/partials/header.php"
?>
<div class="h-100 d-flex" style="height: 1000px;">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">
        <div class="row mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">    
                    <h4 class="">Dashboard</h4>
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

        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card widget-flat">
                    <div class="card-body">
                        <div class="float-end">
                        <i class="bi bi-people-fill"></i>
                        </div>
                        <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Customers</h5>
                        <h3 class="mt-3 mb-3">36,254</h3>
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
                        <h5 class="text-muted fw-normal mt-0" title="Number of Orders">Orders</h5>
                        <h3 class="mt-3 mb-3">5,543</h3>
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
                        <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Revenue</h5>
                        <h3 class="mt-3 mb-3">$6,254</h3>
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
                        <h5 class="text-muted fw-normal mt-0" title="Growth">Growth</h5>
                        <h3 class="mt-3 mb-3">+ 30.56%</h3>
                        <p class="mb-0 text-muted">
                            <span class="text-success me-2"><i class="bi bi-arrow-up-square-fill"></i> 4.87%</span>
                            <span class="text-nowrap">Since last month</span>
                        </p>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col-->
        </div>
    </div>
</div>