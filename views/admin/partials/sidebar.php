<?php 
$current_page = basename($_SERVER['PHP_SELF']);
?>

<aside class="d-flex flex-column flex-shrink-0 p-3 bg-white border-r" style="width: 280px;">
    <ul class="nav nav-pills nav-flush flex-column mb-auto">
      <li class="nav-item">
        <a href="../admin" class="nav-link <?php if($current_page == '/admin'){ echo 'active';} else {echo 'link-dark';} ?>">
            <i class="bi bi-house me-2"></i>
            Home
        </a>
      </li>
      <li>
        <a href="../admin/dashboard" class="nav-link <?php if($current_page == 'dashboard'){ echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-bar-chart me-2"></i>
          Dashboard
        </a>
      </li>
      <li>
        <a href="../admin/orders" class="nav-link <?php if ($current_page == 'orders') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-calendar2-week me-2"></i>
          Orders
        </a>
      </li>
      <li>
        <a href="../admin/foods" class="nav-link <?php if ($current_page == 'foods') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-grid me-2"></i>
          Foods
        </a>
      </li>
      <li>
        <a href="../admin/categories" class="nav-link <?php if ($current_page == 'categories') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-grid me-2"></i>
          Categories
        </a>
      </li>
      <li>
        <a href="../admin/users" class="nav-link <?php if ($current_page == 'users') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-people me-2"></i>
          User
        </a>
      </li>
    </ul>
    <hr>
  </aside>