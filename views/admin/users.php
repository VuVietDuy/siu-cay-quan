<?php
    include "partials/header.php"
?>
<div class=" d-flex">
    <?php include "partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1 border">
        <div class="d-flex justify-content-between mb-2">
            <div></div>
            <div>
                <?php include "add_user.php"?>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($users as $key => $user) {
                        echo '<tr>';
                        echo '<td>'.($key+1).'</td>';
                        echo '<td>'.$user->getName().'</td>';
                        echo '<td>'.$user->getEmail().'</td>';
                        echo '<td>'.$user->getRole().'</td>';
                        echo '<td>';
                        echo '<button class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editUserModal'.$user->getId().'">
                                <i class="bi bi-pencil-square"></i>
                            </button>';
                        echo '<button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>';
                        echo '</td>';
                        echo '</tr>';
                        echo '
                        <div class="modal fade" id="editUserModal'.$user->getId().'" tabindex="-1" aria-labelledby="editUserModalLabel'.$user->getId().'" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="/admin/users/update" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editUserModalLabel'.$user->getId().'">Sửa thông tin người dùng</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="user_id" value="'.$user->getId().'">
                                            <div class="mb-3">
                                                <label for="editName'.$user->getId().'" class="form-label">Họ tên</label>
                                                <input name="name" type="text" class="form-control" id="editName'.$user->getId().'" value="'.$user->getName().'">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editEmail'.$user->getId().'" class="form-label">Email</label>
                                                <input name="email" type="email" class="form-control" id="editEmail'.$user->getId().'" value="'.$user->getEmail().'">
                                            </div>
                                            <div class="mb-3">
                                                <label for="editRole'.$user->getId().'" class="form-label">Vị trí</label>
                                                <select name="role" class="form-select" id="editRole'.$user->getId().'">
                                                    <option value="staff" '.($user->getRole() == "staff" ? "selected" : "").'>Nhân viên</option>
                                                    <option value="admin" '.($user->getRole() == "admin" ? "selected" : "").'>Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>