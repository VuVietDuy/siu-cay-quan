<?php
echo $table;
?>
<link rel="stylesheet" href="assets/styles/menu.css">

<?php include('views/partials/header.php')?>

<div class="menu-container row g-4 p-4">
    <?php
        foreach ($foods as $key => $food) {
            echo '<div class="col-6">';
            echo '<a href="/menu/item?table='.$table.'&food='.$food->getId().'">';
            echo '<div class="image-wrapper round hidden">';
            echo '<img class="w-100" src="'.$food->getImage().'" alt="">';
            echo '</div>';
            echo '<p class="food-name">'.$food->getName().'</p>';
            echo '<button class="add-item">Chon</button>';
            echo '</a>';
            echo '</div>';
        }
    ?>

</div>

<?php include('views/partials/navbar.php')?>