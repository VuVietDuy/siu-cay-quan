<?php
    include "views/admin/partials/header.php"
?>
<div class="h-100 d-flex" style="height: 1000px;">
    <?php include "views/admin/partials/sidebar.php"?>
    <div class="card m-4 p-4 flex-grow-1">
        <table class="table">
            <div class="d-flex justify-content-between">
                <div>
                    <form>
                        <input type="text" class="form-control" placeholder="Search by name...">
                    </form>
                </div>
            </div>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Position</th>
                </tr>
            </thead>
        </table>
    </div>
</div>