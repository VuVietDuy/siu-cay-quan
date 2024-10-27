
<link rel="stylesheet" href="/assets/styles/menu_item.css">
<div>
    <div class="px-3 py-3 bg-brandlight d-flex justify-content-between">
        <button id="backBtn" class="btn border rounded-circle d-flex justify-content-center align-items-center fs-4" style="width:38px; height:38px">
            <i class="bi bi-chevron-left"></i>
        </button>
        <a href="/cart" class="btn border rounded-circle d-flex justify-content-center align-items-center fs-4" style="width:38px; height:38px">
            <i class="bi bi-bag"></i>
        </a>
    </div>
    <form action="/cart" method="post">
        <div class="d-flex flex-column justify-content-between">
            <div >
                <div class="d-flex position-relative">
                    <img class="food-image m-auto rounded-circle z-1 mt-4   " src="<?php echo $food->getImageUrl() ?>" alt="">
                    <div class="position-absolute bg-brandlight h-25 w-100 rounded-circle" style="top: 50%; transform: translateY(-50%);"></div>
                    <div class="position-absolute bg-brandlight h-50 w-100 "></div>
                </div>
                <div class="p-3">
                    <p class="mb-3 fs-3 fw-medium"><?php echo $food->getName()?></p>
                    <p class="mb-4"><?php echo $food->getDescription()?></p>
                    <p id="price" data-price="<?php echo $food->getPrice() ?>" class="mb-3 fs-5 text-brand fw-medium"><?php echo number_format($food->getPrice(), 0)?> đ</p>
                </div>
                <div class="input-group input-group mb-3 p-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="note">
                            <i class="bi bi-card-text"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control outline-none " name="note" placeholder="Ghi chú cho quán" aria-label="Username" aria-describedby="note">
                </div>
            </div>
        </div>
        <div class="fixed-bottom ">
            <hr>
            <div class="px-3 d-flex justify-content-between">
                <span class="fw-medium">Tổng:</span>
                <span id="totalPrice" class="fw-medium text-success">20000 đ</span>
            </div>
            <div class="d-flex px-3 py-2 g-2">
                <?php echo '<input class="d-none" type="text" name="table_id" value="'.$table.'">'?>
                <?php echo '<input class="d-none" type="text" name="food_id" value="'.$food->getId().'">'?>
                <div class="pe-4 ">
                    <div class="btn-group border w-100">
                        <button type="button" id="subBtn"  class="btn d-flex justify-content-center align-items-center">
                            <i class="bi bi-dash"></i>
                        </button>
                        <input id="quantity" name="quantity" style="width: 40px;" class="btn px-0" type="number" value="1">
                        <button  type="button" id="plusBtn" class="btn d-flex justify-content-center align-items-center">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <button type="submit" class="btn btn-success w-100">Thêm giỏ hàng</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="/assets/javascript/menu_item.js"></script>