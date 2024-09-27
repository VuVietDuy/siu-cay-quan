<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/main.css">
    <?php include "./partials/boostrap.min.php" ?>
    <?php include "./partials/boostrap-icons.min.php"?>
</head>
<body class=" bg-body-tertiary">
    <?php
        include "./partials/header.php"
    ?>
    <div class="h-100 d-flex" style="height: 1000px;">
        <?php include "./partials/sidebar.php"?>
        <div class="card m-4 p-4 flex-grow-1">
            <table class="table">
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
</body>
</html>