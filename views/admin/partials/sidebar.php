<?php 
$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', $path);
$current_page = $parts[2];
?>
<link rel="stylesheet" href="/assets/styles/sidebar_admin.css">
<aside class="d-flex flex-column flex-shrink-0 p-3 bg-white border-r aside">
    <ul class="nav nav-pills nav-flush flex-column mb-auto">
        <li>
            <a href="/admin/dashboard"
                class="nav-link <?php if($current_page == 'dashboard'){ echo 'active';} else {echo 'link-dark';} ?>">
                <i class="bi bi-bar-chart me-2"></i>
                <span class="d-none d-lg-inline">Thống kê</span>
            </a>
        </li>
        <li>
            <a href="/admin/orders"
                class="nav-link <?php if ($current_page == 'orders') {echo 'active';} else {echo 'link-dark';} ?>">
                <i class="bi bi-calendar2-week me-2"></i>
                <span class="d-none d-lg-inline">Đơn hàng</span>
            </a>
        </li>
        <li>
            <a href="/admin/foods"
                class="nav-link <?php if ($current_page == 'foods') {echo 'active';} else {echo 'link-dark';} ?>">
                <i class="bi bi-archive me-2"></i>
                <span class="d-none d-lg-inline">Món ăn</span>
            </a>
        </li>
        <li>
            <a href="/admin/categories"
                class="nav-link <?php if ($current_page == 'categories') {echo 'active';} else {echo 'link-dark';} ?>">
                <i class="bi bi-grid me-2"></i>
                <span class="d-none d-lg-inline">Thể loại</span>
            </a>
        </li>
        <!-- <li>
            <a href="/admin/tables"
                class="nav-link <?php if ($current_page == 'tables') {echo 'active';} else {echo 'link-dark';} ?>">
                <i class="bi bi-minecart me-2"></i>
                <span class="d-none d-lg-inline">Bàn</span>
            </a>
        </li> -->
        <li>
            <a href="/admin/users"
                class="nav-link <?php if ($current_page == 'users') {echo 'active';} else {echo 'link-dark';} ?>">
                <i class="bi bi-people me-2"></i>
                <span class="d-none d-lg-inline">Người dùng</span>
            </a>
        </li>
    </ul>
    <hr>
</aside>