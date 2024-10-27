<?php 
$path = $_SERVER['REQUEST_URI'];
$parts = explode('/', $path);
$current_page = $parts[2];
?>
<link rel="stylesheet" href="/assets/styles/sidebar_admin.css">
<aside class="d-flex flex-column flex-shrink-0 p-3 bg-white border-r aside">
    <ul class="nav nav-pills nav-flush flex-column mb-auto">
      <li>
        <a href="/admin/dashboard" class="nav-link <?php if($current_page == 'dashboard'){ echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-bar-chart me-2"></i>
          <span class="d-none d-lg-inline">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="/admin/orders" class="nav-link <?php if ($current_page == 'orders') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-calendar2-week me-2"></i>
          <span class="d-none d-lg-inline">Orders</span>
        </a>
      </li>
      <li>
        <a href="/admin/foods" class="nav-link <?php if ($current_page == 'foods') {echo 'active';} else {echo 'link-dark';} ?>">
        <i class="bi bi-duffle me-2"></i>
          <span class="d-none d-lg-inline">Foods</span>
        </a>
      </li>
      <li>
        <a href="/admin/categories" class="nav-link <?php if ($current_page == 'categories') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-grid me-2"></i>
          <span class="d-none d-lg-inline">Categories</span>
        </a>
      </li>
      <li>
        <a href="/admin/tables" class="nav-link <?php if ($current_page == 'tables') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-grid me-2"></i>
          <span class="d-none d-lg-inline">Table</span>
        </a>
      </li>
      <li>
        <a href="/admin/users" class="nav-link <?php if ($current_page == 'users') {echo 'active';} else {echo 'link-dark';} ?>">
          <i class="bi bi-people me-2"></i>
          <span class="d-none d-lg-inline">User</span>
        </a>
      </li>
    </ul>
    <hr>
  </aside>