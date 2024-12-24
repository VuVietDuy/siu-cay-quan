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
                    foreach ($users as $key => $user) { ?>
                <tr>
                    <td><?= $user->getId() ?></td>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getUsername() ?></td>
                    <td><?= $user->getPassword() ?></td>
                    <td><?= $user->getRole() == "admin" ? "Admin" : "Nhân viên" ?></td>
                    <td>
                        <button class="btn-edit btn btn-primary btn-sm me-2" data-bs-toggle="modal"
                            data-bs-target="#editUserModal" data-user-id="<?= $user->getId() ?>"
                            data-user-name="<?= $user->getName() ?>" data-user-username="<?= $user->getUsername() ?>"
                            data-user-password="<?= $user->getPassword() ?>" data-user-description=""
                            data-user-role="<?= $user->getRole() ?>">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <div class="d-inline">
                            <button type="button" class="btn-delete btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-user-id="<?= $user->getId()?>" data-bs-target="#deleteUserModal">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="deleteUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteUserModalLabel" aria-hidden="true">
    <form action="/admin/users/delete" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteUserModalLabel">Xác nhận</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="inputDeleteUserId" type="text" name="id" class="d-none" value="">
                    <div>Bạn có muốn xoá người dùng này?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editUserModalLabel" aria-hidden="true">
    <form action="/admin/users/edit" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editUserModalLabel">Chỉnh sửa thông tin người dùng</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Input dành riêng cho chỉnh sửa -->
                    <input id="editUserIdInput" type="text" name="id" class="d-none" value="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ tên</label>
                        <input name="name" type="text" class="form-control" id="editUserNameInput"
                            placeholder="Nguyễn Văn A">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên người dùng</label>
                        <input name="username" type="text" class="form-control" id="editUserUsernameInput"
                            placeholder="Tên người dùng">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input name="password" type="password" class="form-control" id="editUserPasswordInput"
                            placeholder="********" autocomplete="new-password">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" id="description" rows="3"
                            placeholder="Mô tả ngắn về người dùng"></textarea>
                    </div>
                    <div class="mb-3">
                        <select name="role" id="editUserRoleInput" class="form-select"
                            aria-label="Default select example">
                            <option selected disabled>Vị trí</option>
                            <option value="staff">Nhân viên</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
const btnDeletes = document.querySelectorAll('.btn-delete');

btnDeletes.forEach((btn) => {
    btn.addEventListener('click', () => {
        const userId = btn.getAttribute('data-user-id');

        const userIdInput = document.getElementById('inputDeleteUserId');
        if (userIdInput) {
            userIdInput.value = userId;
        }
    });
});

const btnEdits = document.querySelectorAll('.btn-edit');
btnEdits.forEach((btn) => {
    btn.addEventListener('click', () => {
        const userId = btn.getAttribute('data-user-id');
        const userName = btn.getAttribute('data-user-name');
        const userUsername = btn.getAttribute('data-user-username');
        const userPassword = btn.getAttribute('data-user-password');
        const userRole = btn.getAttribute('data-user-role');
        const userDescription = btn.getAttribute('data-user-description');

        const editUserIdInput = document.getElementById('editUserIdInput');
        const editUserNameInput = document.getElementById('editUserNameInput');
        const editUserUsernameInput = document.getElementById('editUserUsernameInput');
        const editUserPasswordInput = document.getElementById('editUserPasswordInput');
        const editUserRoleInput = document.getElementById('editUserRoleInput');
        const editUserDescriptionInput = document.getElementById('editUserDescriptionInput');

        editUserIdInput.value = userId;
        editUserNameInput.value = userName;
        editUserUsernameInput.value = userUsername;
        editUserPasswordInput.value = userPassword;
        editUserRoleInput.value = userRole;
        editUserDescriptionInput.value = userDescription;
    });
});
</script>