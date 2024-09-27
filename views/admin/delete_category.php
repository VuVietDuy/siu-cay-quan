<button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal">
    <i class="bi bi-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true">
    <form action="/admin/categories" method="DELETE">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Xác nhận</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div>
                    Bạn có muốn xoá loại này?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">Huỷ</button>
                <button type="submit" class="btn btn-danger">Xoá</button>
            </div>
        </div>
    </form>         
</div>