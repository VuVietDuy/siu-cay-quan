<?php 
require_once 'models/User.php';
require_once 'controllers/BaseController.php';

session_start();
class UserController extends BaseController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if (empty($email) || empty($password)) {
                return "Vui lòng nhập thông tin đầy đủ";
            }

            $user = User::findOne($email);
            
            if ($user && $user->verifyPassword($password)) {
                $_SESSION['user'] = [
                    'email' => $user->getEmail(),
                    'name' => $user->getName(),
                    'role' => $user->getRole()
                ];
                echo "Đăng nhập thành công!";
                header("Location: /admin/users");
                exit();
            } else {
                echo "Sai tài khoản hoặc mật khẩu";
            }
        } else {
            $this->render('/admin/login');
        }
    }

    function index() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }
        $users = User::findAll();
        $this->render('admin/users', ['users' => $users]);
    }

    function logout() {
        session_destroy();
        header('Location: /admin/login');
    }

    function addUser() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header ('Location: /admin/login');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if (empty($name) || empty($email) || empty($password) || empty($role)) {
                return "Vui lòng nhập thông tin đầy đủ";
            }

            $user = new User($name, $email, $password, $role);
            $res = $user->save();
            header('Location: /admin/users');
            return $res;
        }
    }
}
?>