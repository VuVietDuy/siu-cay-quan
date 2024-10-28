<?php
$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', $path);
$parts = explode('?', $parts[1]);
$current_page = $parts[0];
?>

<link rel="stylesheet" href="assets/styles/menu.css">
<div class="nav-container fixed-bottom py-2 px-4 bg-white">
    <div class="d-flex justify-content-around justify-content-sm-center gap-sm-5 m-auto w-sm-50 ">
        <a href="/menu" class="px-3 py-1 d-flex flex-column align-items-center">
        <?php if( $current_page === "menu") {?> 
            <i class="bi bi-house-fill text-brand fs-3"></i> 
        <?php } else {?> 
            <i class="bi bi-house fs-3"></i>
        <?php }?>
        </a>
        <a href="/cart" class="px-3 py-1 d-flex flex-column align-items-center">
            <?php if( $current_page === "cart") {?> 
                <i class="bi bi-bag-fill text-brand fs-3"></i> 
            <?php } else {?> 
                <i class="bi bi-bag fs-3"></i>
            <?php }?>
        </a>
        <a href="/orders" class="px-3 py-1 d-flex flex-column align-items-center">
            <?php if( $current_page === "khac") {?> 
                <i class="bi bi-grid-fill text-brand fs-3"></i> 
            <?php } else {?> 
                <i class="bi bi-grid fs-3"></i>
            <?php }?>
        </a>
    </div>
</div>
