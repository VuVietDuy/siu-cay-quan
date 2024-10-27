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
                        <div id="qrcode"></div>
                        <button class="btn btn-info" id="exportBtn">Export as Image</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="/assets/javascript/generateQRCode.js"></script>
