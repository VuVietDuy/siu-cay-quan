<?php
$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', $path);
$current_page = $parts[1];
?>

<link rel="stylesheet" href="assets/styles/menu.css">
<div class="nav-container fixed-bottom py-2 px-4">
    <div class="d-flex justify-content-between">
        <a href="/menu" class="<?php echo $current_page === "menu" ? "active-nav" : ""?> d-flex flex-column align-items-center">
            <i class="bi bi-house fs-3"></i>
            <span class="fs-6">
                Menu
            </span>
        </a>
        <a href="/carts" class="<?php echo $current_page === "carts" ? "active-nav" : ""?> d-flex flex-column align-items-center">
            <i class="bi bi-bag fs-3"></i>
            <span class="fs-6">
                Giỏ hàng
            </span>
        </a>
        <a href="/menu" class="<?php echo $current_page === "khac" ? "active-nav" : ""?> d-flex flex-column align-items-center">
            <i class="bi bi-grid fs-3"></i>
            <span class="fs-6">
                Khác
            </span>
        </a>
    </div>
</div>
