<?php
require_once 'controllers/BaseController.php';
require_once 'models/Food.php';
require_once 'models/Category.php';

class FoodController extends BaseController {
    function __construct() {

    }

    function index() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header("Location: /admin/login");
            return;
        }
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

    function update() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header("Location: /admin/login");
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $image_url = $_POST['image_url'];
            $food = new Food($id, $name, $description, $price, $image_url, $category_id);
            $food->findByIdAndUpdate();
            header("Location: /admin/foods");
            return;
        } else {
            $food_id = $_GET['id'];
            $food = Food::findById($food_id);
            $categories = Category::find();
            $this->render('admin/update_food', ['food'=> $food, 'categories'=> $categories]);
        }
    }

    function delete() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header("Location: /admin/login");
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            echo $id;
            Food::deleteById($id);
            header("Location: /admin/foods");
            return;
        }
    }
}
?>