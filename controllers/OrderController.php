<?php
require_once 'controllers/BaseController.php';
require_once 'models/Order.php';
require_once 'models/Cart.php';

class OrderController extends BaseController {
    function __construct() {

    }
    function index() {
        $orders = Order::findAll();
        $this->render('admin/orders', ['orders' => $orders]);
    }

    function show() {
        $order_id = $_GET['id'];
        $order = Order::findById($order_id);
        $this->render('admin/detail_order', ['order' => $order]);
    }

    function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $table = $_SESSION['table'];
            $cartItems = Cart::getCart(); // Giả sử bạn đã có lớp Cart để quản lý giỏ hàng
            $totalAmount = 0;

            // Tính tổng số tiền của giỏ hàng
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            // Gọi model để tạo order
            $orderId = Order::create($table, $totalAmount, $cartItems);

            if ($orderId) {
                // Xóa giỏ hàng sau khi tạo order thành công
                Cart::clearCart();

                // Chuyển hướng đến trang hiển thị order thành công
                // header("Location: /orders/success?order_id=" . $orderId);
            } else {
                echo "Tạo order thất bại.";
            }
        }
    }

    public function success() {
        // Lấy ID order từ URL và hiển thị chi tiết order
        // $orderId = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;

        // if ($orderId) {
        //     $order = Order::findById($orderId); // Giả sử bạn có phương thức findById trong model Order
        //     require_once 'views/success.php';
        // } else {
        //     echo "Order không tồn tại.";
        // }
        $this->render('success', []);
    }
}
?>