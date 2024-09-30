<?php
require_once 'controllers/BaseController.php';
require_once 'models/Food.php';

class MenuController extends BaseController {
    function index() {
        $table = $_GET['table'];
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['table'] = $table;

        $foods = Food::findAll();
        $this->render('menu', ['foods' => $foods, 'table' => $table]);
    }

    function show() {
        $table = $_GET['table'];
        $food_id = $_GET['food'];
        $food = Food::findById($food_id);
        $this->render('menu_item', ['food' => $food, 'table' => $table]);
    }
}

?>