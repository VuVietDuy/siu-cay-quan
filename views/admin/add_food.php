<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addFoodModal">
    <i class="bi bi-person-plus"></i>    
    Thêm
</button>

<!-- Modal -->
<div class="modal fade" id="addFoodModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addFoodModalLabel" aria-hidden="true">
    <form action="/admin/foods" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addFoodModalLabel">Thêm mới món</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    <div class="mb-4 d-flex justify-content-center">
                        <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                        alt="example placeholder" style="width: 300px;" />
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn btn-primary btn-rounded">
                            <label class="form-label text-white m-1" for="customFile1">Choose file</label>
                            <input name="" type="file" class="form-control d-none" id="customFile1" 
                            />
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Tên món</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Tên món">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Giá</label>
                    <input name="price" type="number" class="form-control" id="email" placeholder="Giá">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <select name="category_id" class="form-select">
                        <option selected disabled>Thể loại</option>
                        <?php
                            foreach ($categories as $key => $category) {
                                echo '<option value="'.$category->getId().'">'.$category->getName().'</option>';
                            }
                        ?>
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