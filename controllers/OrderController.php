<?php
require_once 'controllers/BaseController.php';
require_once 'models/Order.php';
require_once 'models/Cart.php';
require_once 'models/Food.php';

class OrderController extends BaseController {
    function __construct() {
        // Khởi tạo session nếu chưa có
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    function index() {
        $orders = Order::findAll(['status' => 'completed']);
        $this->render('admin/orders', ['orders' => $orders]);
    }

    function show() {
        $order_id = $_GET['id'];
        $order = Order::findById($order_id);
        $foods = Food::findAll();
        $this->render('admin/detail_order', ['order' => $order, 'foods' => $foods]);
    }

    function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $table = $_SESSION['customer']['table'];
            $cartItems = Cart::getCart(); 
            $totalAmount = 0;

            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            $order_id = Order::create($table, $cartItems);

            if ($order_id) {
                Cart::clearCart();

                if (!isset($_SESSION['customer']['orders']) || !is_array($_SESSION['customer']['orders'])) {
                    $_SESSION['customer']['orders'] = [];
                }
    
                $_SESSION['customer']['orders'][] = $order_id;

                header("Location: /orders");
            } else {
                echo "Tạo order thất bại.";
            }
        }
    }

    public function pay() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $payment_method = $_POST['payment_method'];
            $payment_status = "paid";
            $order_id = $_POST["order_id"];

            if (empty($payment_method)) {
                return "Error";
            }

            $result = Order::pay($order_id, $payment_method);
            
            header('Location: /admin/orders');
        }
    }

    public function orderHistory() {
        $orders = $_SESSION['customer']['orders'];
        $list_orders = [];
        foreach ($orders as $order_id) {
            $list_orders[] = Order::findById($order_id);
        }
        
        // Render view với dữ liệu orders
        $this->render('orders', ['orders' => $list_orders]);
    }
}
?>