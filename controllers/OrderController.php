<?php
require_once 'controllers/BaseController.php';
require_once 'models/Order.php'
require_once 'models/Cart.php'

class OrderController extends BaseController {
    function __construct() {

    }
    function index() {
        $this->render('admin/orders', []);
    }

    function show() {
        $this->render('admin/detail_order', []);
    }

    function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $customerName = $_POST['customer_name'];
            $cartItems = Cart::getCart(); // Giả sử bạn đã có lớp Cart để quản lý giỏ hàng
            $totalAmount = 0;

            // Tính tổng số tiền của giỏ hàng
            foreach ($cartItems as $item) {
                $totalAmount += $item['price'] * $item['quantity'];
            }

            // Gọi model để tạo order
            $orderId = Order::createOrder($customerName, $totalAmount, $cartItems);

            if ($orderId) {
                // Xóa giỏ hàng sau khi tạo order thành công
                Cart::clearCart();

                // Chuyển hướng đến trang hiển thị order thành công
                header("Location: /order/success?order_id=" . $orderId);
            } else {
                echo "Tạo order thất bại.";
            }
        }
    }
}
?>