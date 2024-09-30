<?php
class Order {
    public $id;
    public $total_number;
    public $total_price;
    public $status;

    public static function create($table_number, $total_price, $cartItems) {
        global $conn;

        $conn->begin_transaction();
        try {
            $sql = "INSERT INTO orders (table_number, total_price, status) VALUES (?, ?, 'pending')";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }
            $stmt->bind_param("dd", $table_number, $total_price);
            $stmt->execute();
            $orderId = $stmt->insert_id;

            $sql = "INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $conn->error);
            }

            foreach ($cartItems as $item) {
                $stmt->bind_param("iiid", $orderId, $item['id'], $item['quantity'], $item['price']);
                $stmt->execute();
            }

            $conn->commit();
            return $orderId;
        } catch (Exception $e) {
            $conn->rollback();
            return false;
        }
    }
    
    public static function findAll() {
        global $conn;

        // Lấy tất cả các order
        $sql = "SELECT * FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $orders = [];

            // Lặp qua các order
            while ($row = $result->fetch_assoc()) {
                $order = new stdClass();
                $order->id = $row['id'];
                $order->table_number = $row['table_number'];
                $order->total_price = $row['total_price'];
                $order->status = $row['status'];
                $order->items = [];

                // Lấy chi tiết các món ăn trong order
                $sql_items = "SELECT food_id, quantity, price FROM order_items WHERE order_id = ?";
                $stmt = $conn->prepare($sql_items);
                if (!$stmt) {
                    throw new Exception("Prepare failed: " . $conn->error);
                }
                $stmt->bind_param("i", $order->id);
                $stmt->execute();
                $items_result = $stmt->get_result();

                // Lặp qua các món ăn trong order
                while ($item_row = $items_result->fetch_assoc()) {
                    $order->items[] = $item_row;
                }

                // Thêm order vào danh sách
                $orders[] = $order;
            }

            return $orders;
        } else {
            return [];
        }
    }

    public static function findById($id) {
        global $conn;

        // Lấy thông tin đơn hàng từ bảng orders
        $sql = "SELECT * FROM orders WHERE id = ?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $order_row = $result->fetch_assoc();
            $order = new stdClass();
            $order->id = $order_row['id'];
            $order->table_number = $order_row['table_number'];
            $order->total_price = $order_row['total_price'];
            $order->status = $order_row['status'];
            $order->items = [];

            // Lấy chi tiết các món ăn từ bảng order_items
            $sql_items = "SELECT food_id, quantity, price FROM order_items WHERE order_id = ?";
            $stmt_items = $conn->prepare($sql_items);
            if (!$stmt_items) {
                die("Prepare failed: ". $conn->error);
            }
            $stmt_items->bind_param("i", $order->id);
            $stmt_items->execute();
            $items_result = $stmt_items->get_result();

            // Lặp qua các món ăn trong order
            while ($item_row = $items_result->fetch_assoc()) {
                $order->items[] = $item_row;
            }

            return $order;
        } else {
            return null; // Không tìm thấy order với ID này
        }
    }
}
?>