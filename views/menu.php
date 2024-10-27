<?php
if(session_status() === PHP_SESSION_NONE) {
  session_start();
}

if (isset($_GET['table'])) {
  $table = $_GET['table'];
  $customer = [
    'table' => $table,
    'cart' => [],
  ];
  
  $_SESSION['customer'] = $customer;
}

?>
<?php include('views/partials/header.php')?>

<div class="d-flex container gap-2 justify-content-between mb-4 mt-4">
    <div class="input-group">
        <button class="btn btn-outline-secondary" type="button" id="button-addon1">
            <i class="bi bi-search"></i>
        </button>
        <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
    </div>
    <button class="btn btn-success">
        <i class="bi bi-sliders"></i>
    </button>
</div>

<div id="menuBanner" class="carousel slide">
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#menuBanner" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#menuBanner" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#menuBanner" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active ratio ratio-21x9">
      <img src="/assets/images/banner_1.jpg" class="d-block w-100 object-fit-cover" alt="Banner 1">
    </div>
    <div class="carousel-item  ratio ratio-21x9">
      <img src="/assets/images/banner_2.jpg" class="d-block w-100 object-fit-cover" alt="Banner 2">
    </div>
    <div class="carousel-item  ratio ratio-21x9">
      <img src="/assets/images/banner_3.jpg" class="d-block w-100 object-fit-cover" alt="Banner 3">
    </div>
  </div>
</div>

<div class="menu-container container m-auto mt-4 mb-5 row g-3">
    <?php foreach ($foods as $key => $food): ?>
        <div class="col-6 col-sm-3">
            <a href="/menu/item?table=<?php echo $table; ?>&food=<?php echo $food->getId(); ?>">
              <div class="card w-100">
                <div class="ratio ratio-4x3">
                  <img class="card-img-top object-fit-cover" src="<?php echo $food->getImageUrl()?>" alt="">
                </div>
                <div class="card-body p-2">
                  <h5 class="card-title fs-6">
                    <?php echo $food->getName()?>
                  </h5>
                  <div>
                    <span class="text-info-emphasis fs-6">
                      <?php echo number_format($food->getPrice(), 0) ?>
                    </span>
                  </div>
                </div>
              </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>
<div style="height:75px"></div>

<?php include('views/partials/navbar.php')?>