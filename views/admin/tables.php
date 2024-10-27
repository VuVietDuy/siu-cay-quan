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
                            <button class="updateUserBtn btn btn-primary btn-sm me-2" data-user-id="'.$user->getId().'">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
<script src="/assets/javascript/tables.js"></script>
