<?php
    include "views/admin/partials/header.php";

?>
<div class="h-100 d-flex" style="height: 1000px;">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">
    <form action="/admin/foods" method="post" enctype="multipart/form-data">
        <h1 class="fs-5">Thêm mới món</h1>
            <div>
                <div class="d-flex justify-content-center">
                    <label class="form-label text-white m-1" for="imageInput">
                        <img id="selectedImage" src="/assets/images/placeholder.jpg"
                        alt="example placeholder" style="width: 300px;" />
                    </label>
                    <input id="imageInput" name="image" type="file" class="form-control d-none" id="customFile1" 
                    />
                </div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Tên món</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Tên món">
            </div>
            <div class="row gap-2">
                <div class="mb-3 col">
                    <label for="price" class="form-label">Giá</label>
                    <input id="price" name="price" type="number" class="form-control" placeholder="Giá">
                </div>
                <div class="mb-3 col">
                    <label for="category_id" class="form-label">Thể loại</label>
                    <select id="category_id" name="category_id" class="form-select">
                        <option selected disabled>Chọn thể loại</option>
                        <?php
                            foreach ($categories as $key => $category) {
                                echo '<option value="'.$category->getId().'">'.$category->getName().'</option>';
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Mô tả</label>
                <textarea id="description" name="description" class="form-control" placeholder="Nhập mô tả ở đây" rows="3"></textarea>
            </div>
            
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Huỷ</button>
            <button type="submit" class="btn btn-primary">Lưu</button>
    </form>         
    </div>
</div>
<script src="/assets/javascript/addFood.js"></script>
