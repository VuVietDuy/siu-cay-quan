<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addTableModal">
    <i class="bi bi-plus"></i>
    Thêm
</button>

<!-- Modal -->
<div class="modal fade" id="addTableModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTableModalLabel" aria-hidden="true">
    <form action="/admin/tables" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTableModalLabel">Thêm bàn</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="table_id" class="form-label">Số bàn</label>
                        <input name="table_id" type="text" class="form-control" id="table_id" placeholder="">
                    </div>

                    <div class="mb-3">
                        <label for="capacity" class="form-label">Sức chứa</label>
                        <input name="capacity" type="number" class="form-control" id="capacity" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Trạng thái</label>
                        <select name="status" class="form-select">
                            <option value="available">Sẵn sàng</option>
                            <option value="occupied">Đã có khách</option>
                        </select>
                    </div>

                    <div class="form-check form-switch">
                        <input name="is_active" class="form-check-input" type="checkbox" role="switch" id="isActiveCheckBox" checked>
                        <label class="form-check-label" for="isActiveCheckBox">Hoạt động</label>
                    </div>

                    <div class="qrcode-container d-none">
                        <input class="d-none" id="text" name="qrcode" type="text" style="width:80%" /><br />
                        <div class="d-flex">
                            <div id="qrcode" class="me-4 w-fit"></div>
                            <div class="flex-grow-1">
                                <a class="btn btn-info w-100" id="exportBtn">Export as Image</a>
                            </div>
                        </div>
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
<script src="/assets/javascript/addTable.js"></script>
