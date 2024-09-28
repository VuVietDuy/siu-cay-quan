<?php
    include "views/admin/partials/header.php";
?>
<div class="h-100 d-flex" style="height: 1000px;">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">

        <div class="d-flex mb-2 justify-content-between">
            <form action="">
                <input type="text" class="form-control" placeholder="Tìm kiếm theo tên">
            </form>
            <?php include "views/admin/add_category.php"?>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ngày tạo</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($categories !== null)
                    foreach ($categories as $key => $category) {
                        echo '<tr>';
                        echo '<td>'.$key.'</td>';
                        echo '<td>'.$category->getName().'</td>';
                        echo '<td>'.$category->getDescription().'</td>';
                        echo '<td>'.$category->getCreatedAt().'</td>';
                        echo '<td>';
                        echo '<button class="btn btn-primary btn-sm me-2">
                                <i class="bi bi-pencil-square"></i>
                            </button>';
                        include 'views/admin/delete_category.php';
                        echo '</td>';
                        echo '</tr>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>