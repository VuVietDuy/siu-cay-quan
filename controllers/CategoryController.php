<?php
require_once 'controllers/BaseController.php';
require_once 'models/Category.php';

class CategoryController extends BaseController {

    public function index() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }
        $categories = Category::find();
        $this->render('admin/categories', ['categories' => $categories]);
    }

    public function create() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name = $_POST['name'];
            $description = $_POST['description'];

            if (empty($name) || empty($description)) {
                return "Vui lòng nhập thông tin đâỳ đủ";
            }

            $new_category = Category::create($name, $description);
            
            header('Location: /admin/categories');
        }
    }

    public function update() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];

            $category = new Category($id, $name, $description);

            if (empty($name) || empty($description)) {
                return "Vui lòng nhập thông tin đâỳ đủ";
            }

            Category::findByIdAndUpdate($category);
            
            header('Location: /admin/categories');
        }
    }

    public function delete() {
        if ($_SESSION['user']['role']!== 'admin') {
            header('Location: /admin/login');
        }
        $id = $_POST['id'];
        $res = Category::findByIdAndDelete($id);
        header('Location: /admin/categories');
    }
}
?>