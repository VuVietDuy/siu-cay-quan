<?php
require_once('controllers/BaseController.php');
require_once('models/Table.php');

class TableController extends BaseController {
    function index() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header ('Location: /admin/login');
            return;
        }
        $tables = Table::findAll();
        $this->render('admin/tables', ['tables' => $tables]);
    }

    function create() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header ('Location: /admin/login');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $table_number = $_POST['table_number'];
            $capacity = $_POST['capacity'];
            $qr = $_POST['qr'];
            $status = $_POST['status'];
            $is_active = $_POST['is_active'];


            $table = new Table($table_number, $capacity, $qr, $status, ($is_active == 'on') ? true : false);
            $res = $table->save();
            header('Location: /admin/tables');
            return $res;
        }
    }
}
?>