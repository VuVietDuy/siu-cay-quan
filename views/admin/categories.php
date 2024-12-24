<?php
    include "views/admin/partials/header.php";
?>
<div class="d-flex">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">

        <div class="d-flex mb-2 justify-content-between">
            <form action="">
                <input type="text" class="form-control" placeholder="Tìm kiếm theo tên">
            </form>
            <?php include "views/admin/add_category.php"?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($categories !== null):
                    foreach ($categories as $key => $category):
                ?>
                <tr>
                    <td><?= $category->getId()?></td>
                    <td><?=$category->getName()?></td>
                    <td><?=$category->getDescription()?></td>
                    <td><?=$category->getCreatedAt()?></td>
                    <td>
                        <button class="btn-edit btn btn-primary btn-sm me-2" data-bs-toggle="modal"
                            data-bs-target="#editCategoryModal" data-category-id="<?=$category->getId() ?>"
                            data-category-name="<?=$category->getName()?>"
                            data-category-description="<?= $category->getDescription() ?>">
                            <i class="bi bi-pencil-square"></i>
                        </button>
                        <div class="d-inline">
                            <button type="button" class="btn-delete btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteCategoryModal" data-category-id="<?=$category->getId() ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                </tr>
                <?php endforeach;
                    endif;
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="deleteCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <form action="/admin/categories/delete" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Xác nhận</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="input-delete-category-id" type="text" name="id" class="d-none" value="">
                    <div>Bạn có muốn xoá loại này?</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-bs-dismiss="modal">Huỷ</button>
                    <button type="submit" class="btn btn-danger">Xoá</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <form action="/admin/categories/edit" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editCategoryModalLabel">Chỉnh sửa danh mục</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Input dành riêng cho chỉnh sửa -->
                    <input id="input-edit-category-id" type="text" name="id" class="d-none" value="">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên thể loại</label>
                        <input name="name" type="text" class="form-control" id="editCategoryNameInput"
                            placeholder="Nhập tên loại ở đây">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea name="description" class="form-control" id="editCategoryDescriptionInput"
                            placeholder="Nhập mô tả ở đây" rows="3"></textarea>
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
        const categoryId = btn.getAttribute('data-category-id');

        const categoryIdInput = document.getElementById('input-delete-category-id');
        if (categoryIdInput) {
            categoryIdInput.value = categoryId;
        }

    });
});

const btnEdits = document.querySelectorAll('.btn-edit');
btnEdits.forEach((btn) => {
    btn.addEventListener('click', () => {
        const categoryId = btn.getAttribute('data-category-id');
        const categoryName = btn.getAttribute('data-category-name');
        const categoryDescription = btn.getAttribute('data-category-description');

        const editCategoryIdInput = document.getElementById('input-edit-category-id');
        const editCategoryNameInput = document.getElementById('editCategoryNameInput');
        const editCategoryDescriptionInput = document.getElementById('editCategoryDescriptionInput');

        editCategoryIdInput.value = categoryId;
        editCategoryNameInput.value = categoryName;
        editCategoryDescriptionInput.value = categoryDescription;

    });
});
</script>