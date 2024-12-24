<nav class="navbar navbar-expand-lg border-bottom bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="/assets/images/logo_full.png" width="40" class="me-1" />
            <span>
                SIU CAY QUÁN
            </span>
        </a>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong><?php $_SESSION['user']['name'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                <li><a class="dropdown-item" href="#">Trang cá nhân</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="/admin/logout">Đăng xuất</a></li>
            </ul>
        </div>
    </div>
</nav>