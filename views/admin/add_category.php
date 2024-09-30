<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <i class="bi bi-plus"></i>  
    Thêm
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form action="/admin/categories" method="POST">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm mới loại món ăn</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Tên thể loại</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Nhập tên loại ở đây">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả</label>
                    <textarea name="description" class="form-control" id="description" placeholder="Nhập mô tả ở đây" rows="3"></textarea>
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