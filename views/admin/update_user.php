<div class="modal fade" id="editUserModal<?php echo $user->getId(); ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?php echo $user->getId(); ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/admin/users/update.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel<?php echo $user->getId(); ?>">Sửa thông tin người dùng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="<?php echo $user->getId(); ?>">
                    <div class="mb-3">
                        <label for="editName<?php echo $user->getId(); ?>" class="form-label">Họ tên</label>
                        <input name="name" type="text" class="form-control" id="editName<?php echo $user->getId(); ?>" value="<?php echo $user->getName(); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editEmail<?php echo $user->getId(); ?>" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="editEmail<?php echo $user->getId(); ?>" value="<?php echo $user->getEmail(); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editRole<?php echo $user->getId(); ?>" class="form-label">Vị trí</label>
                        <select name="role" class="form-select" id="editRole<?php echo $user->getId(); ?>">
                            <option value="staff" <?php echo $user->getRole() == "staff" ? "selected" : ""; ?>>Nhân viên</option>
                            <option value="admin" <?php echo $user->getRole() == "admin" ? "selected" : ""; ?>>Admin</option>
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
</div>
