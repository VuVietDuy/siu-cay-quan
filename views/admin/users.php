<?php
    include "partials/header.php"
?>
<div class=" d-flex">
    <?php include "partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1 border">
        <div class="d-flex justify-content-between mb-2">
            <div></div>
            <div>
                <?php include "add_user.php"?>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($users as $key => $user) {
                        echo '<tr>';
                        echo '<td>'.($key+1).'</td>';
                        echo '<td>'.$user->getName().'</td>';
                        echo '<td>'.$user->getEmail().'</td>';
                        echo '<td>'.$user->getRole().'</td>';
                        echo '<td>';
                        echo '<button class="btn btn-primary btn-sm me-2">
                                <i class="bi bi-pencil-square"></i>
                            </button>';
                        echo '<button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>';
                        echo '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>