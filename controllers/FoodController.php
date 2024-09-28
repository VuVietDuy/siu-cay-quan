<?php
require_once 'controllers/BaseController.php';
require_once 'models/Food.php';
require_once 'models/Category.php';

class FoodController extends BaseController {
    function __construct() {

    }

    function index() {
        $foods = Food::findAll();
        $this->render('admin/foods', ['foods' => $foods]);
    }

    function create() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header("Location: /admin/login");
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $image = "/uploads/my_cay.jpeg";
            $food = Food::create($name, $description, $price, $image, $category_id);
            header("Location: /admin/foods");
            return;
        } else {
            $categories = Category::find();
            $this->render('admin/add_food', ['categories'=> $categories]);
        }
    }
}
?>