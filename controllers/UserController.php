<?php 
require_once 'models/User.php';
require_once 'controllers/BaseController.php';

session_start();
class UserController extends BaseController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (empty($username) || empty($password)) {
                $this->render('/admin/login', ['message' => "Vui lòng nhập thông tin đầy đủ"]);
                return;
            }

            $user = User::findOne($username);

            if (!$user) {
                $this->render('/admin/login', ['message' => "Tài khoản không tồn tại"]);
                return;
            }
            
            if ($user->verifyPassword($password)) {
                $_SESSION['user'] = [
                    'username' => $user->getUsername(),
                    'name' => $user->getName(),
                    'role' => $user->getRole()
                ];
                echo "Đăng nhập thành công!";
                header("Location: /admin/dashboard");
                exit();
            } else {
                $this->render('/admin/login', ['message' => "Sai mật khẩu hoặc tên tài khoản"]);
                return;
            }
        } else {
            $this->render('/admin/login', ['message' => null]);
            return;
        }
    }

    function index() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }
        $role = $_GET['role'];
        
        $users = User::findAll($role);
        $this->render('admin/users', ['users' => $users, 'role' => $role]);
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
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if (empty($name) || empty($username) || empty($password) || empty($role)) {
                return "Vui lòng nhập thông tin đầy đủ";
            }

            $user = new User($name, $username, $password, $role);
            $res = $user->save();
            header('Location: /admin/users');
            return $res;
        }
    }

    function update() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if (empty($name) || empty($username) || empty($password) || empty($role)) {
                return "Vui lòng nhập thông tin đầy đủ";
            }

            $user = new User($name, $username, $password, $role);
            $user->setId($id);
            $res = $user->findByIdAndUpdate();
            header('Location: /admin/users');
            return $res;
        }
    }

    function delete() {
        if ($_SESSION['user']['role'] !== 'admin') {
            header('Location: /admin/login');
        }

        $id = $_POST['id'];

        User::findByIdAndDelete($id);
        header('Location: /admin/users');
    }
}
?>