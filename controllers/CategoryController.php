<?php
require_once 'controllers/BaseController.php';
require_once 'models/Category.php';

class CategoryController extends BaseController {

    public function index() {

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

    public function delete($id) {
        if ($_SESSION['user']['role']!== 'admin') {
            header('Location: /admin/login');
        }

        // $res = Category::findByIdAndDelete()
        echo $id;
    }
}
?>