<?php include("views/partials/nav.php") ?>

<div class="container-xxl py-5 mt-5" id="menu">
    <div class="container mt-5">
        <div class="text-center">
            <h5 class="text-center text-primary fw-normal section-title">
                Menu món ăn
            </h5>
            <h1 class="mb-5">Món bán chạy nhất</h1>
        </div>
        <div class="text-center">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3 active" href="#tab-1"
                        data-bs-toggle="pill">
                        <i class="fa fa-hamburger fa-2x text-primary"></i>
                        <div class="ps-3">
                            <h6 class="mt-n1 mb-0">Món chính </h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" href="#tab-2" data-bs-toggle="pill">
                        <i class="fa fa-utensils fa-2x text-primary"></i>
                        <div class="ps-3">
                            <h6 class="mt-n1 mb-0">Tráng miệng</h6>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 pb-3" href="#tab-3" data-bs-toggle="pill">
                        <i class="fa fa-coffee fa-2x text-primary"></i>
                        <div class="ps-3">
                            <h6 class="mt-n1 mb-0">Đồ uống</h6>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="tab-1" class="fade p-0 show active">
                    <div class="row g-4">
                        <?php foreach ($foods as $key => $food): ?>
                        <div class="col-lg-6">
                            <a href="/menu/item?table=<?= $table; ?>&food=<?= $food->getId(); ?>">
                                <div class="d-flex align-content-center">
                                    <div style="width: 80px; height: 80px; ">
                                        <img src="<?= $food->getImageUrl()?>" class="w-100 h-100 object-fit-cover"
                                            alt="">
                                    </div>
                                    <div class="flex-grow-1 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span><?= $food->getName() ?></span>
                                            <span
                                                class="text-primary"><?= number_format($food->getPrice(), 0) ?>đ</span>
                                        </h5>
                                        <small class="fst-italic">
                                            <?= $food->getDescription() ?>
                                        </small>

                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>