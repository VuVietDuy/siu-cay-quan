<?php
require_once 'controllers/BaseController.php';
require_once 'models/Food.php';

class HomeController extends BaseController {
    function index() {
        $table = $_GET['table'];
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['table'] = $table;

        $foods = Food::findAll();
        $this->render('index', ['foods' => $foods, 'table' => $table]);
    }
}
?>