
<div>
    <div class="fixed-top px-3 py-2 bg-white">
        <p class="fs-3 m-0">
            <?php echo $food->getName()?>
        </p>
    </div>
    <div class="mt-6">
        <div class="image-container w-100 max-h-25 overflow-hidden">
            <?php echo '<img class="w-100 image " src="'.$food->getImage().'" alt="">'?>
        </div>
        <div class="p-2">
            <p class="mb-1 fs-3 fw-bold"><?php echo $food->getName()?></p>
            <p class="mb-1"><?php echo $food->getPrice()?></p>
            <p class="mb-1"><?php echo $food->getDescription()?></p>
        </div>
    </div>
    <form action="/carts" method="post">
        <div class="fixed-bottom d-flex px-3 py-2 g-2">
            <?php echo '<input class="d-none" type="text" name="table_id" value="'.$table.'">'?>
            <?php echo '<input class="d-none" type="text" name="food_id" value="'.$food->getId().'">'?>
            <div class="w-50  pe-4 ">
                <div class="btn-group border w-100">
                    <button class="btn d-flex justify-content-center align-items-center">
                        <i class="bi bi-dash"></i>
                    </button>
                    <input name="quantity" style="width: 40px;" class="btn w-25 px-0" type="text" value="1">
                    <button class="btn d-flex justify-content-center align-items-center">
                        <i class="bi bi-plus"></i>
                    </button>
                </div>
            </div>
            <div class="w-50">
                <button type="submit" class="btn btn-primary">Thêm vào giỏ hàng</button>
            </div>
        </div>
    </form>
</div>