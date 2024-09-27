<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-person-plus"></i>    
    Thêm
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="/admin/users" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm mới người dùng</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ tên</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Địa chỉ email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input name="password" type="password" class="form-control" id="password" placeholder="********">
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Xác nhận mật khẩu</label>
                    <input name="confirm_password" type="confirm_password" class="form-control" id="confirm_password" placeholder="********">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <select name="role" class="form-select" aria-label="Default select example">
                        <option selected disabled>Vị trí</option>
                        <option value="staff">Nhân viên</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </form>         
</div>