<?php
    include "views/admin/partials/header.php"
?>
<div class="h-100 d-flex" style="min-height: 1000px;">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">
        <table class="table">
            <div class="d-flex justify-content-between">
                <div>
                    <form>
                        <input type="text" class="form-control" placeholder="Search by name...">
                    </form>
                </div>
                <a href="/admin/foods/new" class="btn btn-primary">Thêm món</a>
            </div>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($foods !== null)
                    foreach ($foods as $key => $food) {
                        echo '<tr>';
                        echo '<td>'.$key.'</td>';
                        echo '<td>'.$food->getName().'</td>';
                        echo '<td>'.$food->getPrice().'</td>';
                        echo '<td>'.$food->getCreatedAt().'</td>';
                        echo '<td>';
                        echo '<button class="btn btn-primary btn-sm me-2">
                                <i class="bi bi-pencil-square"></i>
                            </button>';
                        // include 'views/admin/delete_category.php';
                        echo '</td>';
                        echo '</tr>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>