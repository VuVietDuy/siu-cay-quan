<?php
    include "partials/header.php";
?>
<div class=" d-flex">
    <?php include "partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1 border">
        <div class="d-flex justify-content-between mb-2">
            <div>
                <form action="/admin/users" method="GET">
                    <select name="role" onChange="this.form.submit()" class="form-select">
                        <option value="" <?php if ($role == '') echo 'selected'?>>Tất cả</option>
                        <option value="admin" <?php if ($role == 'admin') echo 'selected'?>>Admin</option>
                        <option value="staff" <?php if ($role == 'staff') echo 'selected'?>>Nhân viên</option>
                    </select>
                </form>
            </div>
            <div>
                <?php include "add_user.php"?>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Họ tên</th>
                    <th scope="col">Tên tài khoản</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Chức vụ</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($users as $key => $user) {
                        echo '<tr>';
                        echo '<td>'.$user->getId().'</td>';
                        echo '<td>'.$user->getName().'</td>';
                        echo '<td>'.$user->getUsername().'</td>';
                        echo '<td>'.$user->getPassword().'</td>';
                        echo '<td>'.$user->getRole().'</td>';
                        echo '<td>';
                        echo '<button class="updateUserBtn btn btn-primary btn-sm me-2" data-user-id="'.$user->getId().'">
                                <i class="bi bi-pencil-square"></i>
                            </button>';
                        echo '<button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                                </button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="/assets/javascript/updateUser.js"></script>
