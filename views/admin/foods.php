<?php
    include "views/admin/partials/header.php"
?>
<link rel="stylesheet" href="/assets/styles/foods.css">
<div class="d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">
        <table class="table">
            <div class="d-flex justify-content-between">
                <div>
                    <form class="d-flex">
                        <input type="text" class="form-control" placeholder="Tìm kiếm...">
                    </form>
                </div>
                <a href="/admin/foods/new" class="btn btn-primary"><i class="bi bi-plus"></i> Thêm món</a>
            </div>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Tên</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($foods !== null)
                    foreach ($foods as $key => $food) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <td>
                        <img class="food-image" src="<?= $food->getImageUrl() ?>" alt="">
                    </td>
                    <td><?= $food->getName() ?></td>
                    <td><?= $food->getPrice() ?></td>
                    <td><?= $food->getCreatedAt() ?></td>
                    <td>
                        <a href="/admin/foods/edit?id=<?=$food->getId()?>" class="btn btn-primary btn-sm me-2">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="button" class="btn-delete-food btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteFoodModal" data-food-id="<?= $food->getId() ?>">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="modal fade" id="deleteFoodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteFoodModalLabel" aria-hidden="true">
    <form action="/admin/foods/delete" method="POST">
        <input class="d-none" type="text" id="foodIdInputDelete" name="id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteFoodModalLabel">Xác nhận</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        Bạn có muốn xoá món ăn này?
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </div>
            </div>
    </form>
</div>

<script>
const btnDeletes = document.querySelectorAll('.btn-delete-food');

btnDeletes.forEach((btn) => {
    btn.addEventListener('click', () => {
        const foodId = btn.getAttribute('data-food-id');

        const foodIdInputDelete = document.getElementById('foodIdInputDeleteDelete');
        if (foodIdInputDelete) {
            foodIdInputDelete.value = foodId;
        }

    });
});
</script>