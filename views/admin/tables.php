<?php
    include "views/admin/partials/header.php";
?>

<div class="mh-50 d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1 border">
        <div class="d-flex justify-content-between">
            <div></div>
            <div>
                <?php include "add_table.php"?>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Mã QR</th>
                    <th>Số bàn</th>
                    <th>Sức chứa</th>
                    <th>Đang hoạt động</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tables as $key => $table) {?>
                    <tr>
                        <td>
                            <?php echo $key + 1?>
                        </td>
                        <td>
                            <div id="qrcode-<?php echo $key ?>" data-qr-code="<?php echo $table->getQr() ?>"></div>
                        </td>
                        <td>
                            <?php echo $table->getTableId()?>
                        </td>
                        <td>
                            <?php echo $table->getCapacity()?>
                        </td>
                        <td>
                            <span class="badge <?php echo ($table->getIsActive() == 1) ? "text-bg-success" : "text-bg-secondary" ?>">
                                <?php echo ($table->getIsActive() == 1) ? "Đang hoạt động" : "Ngừng hoạt động" ?>
                            </span>
                        </td>

                        <td>
                            <span class="badge <?php echo ($table->getStatus() == 'available') ? "text-bg-success" : "text-bg-secondary" ?>">
                                <?php echo ($table->getStatus() == 'available') ? "Trống" : "Đã có khách" ?>
                            </span>
                        </td>
                        <td>
                            <?php echo $table->getCreatedAt() ?>
                        </td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#detailTableModal"
                                    class="updateTableBtn btn btn-primary btn-sm me-2"
                                    data-table-id="<?php echo $table->getTableId(); ?>"
                                    data-table-capacity="<?php echo $table->getCapacity(); ?>"
                                    data-table-status="<?php echo $table->getStatus(); ?>"
                                    data-table-active="<?php echo $table->getIsActive(); ?>">
                                <i class="bi bi-pencil-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="detailTableModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detailTableModalLabel" aria-hidden="true">
    <form action="/admin/tables" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="detailTableModalLabel">Thêm bàn</h1>
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
                        <div id="qrcode" class="mb-2"></div>
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

<script src="/assets/javascript/tables.js"></script>
