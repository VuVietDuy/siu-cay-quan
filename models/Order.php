<?php
class Order {
    public $id;
    public $table_id;
    public $status;
    public $total_price;
    public $payment_method;
    public $payment_status;
    public $payment_time;
    public $items;

    function __construct() {

    }

    // Getter and Setter for id
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter and Setter for table_id
    public function getTableId() {
        return $this->table_id;
    }

    public function setTableId($table_id) {
        $this->table_id = $table_id;
    }

    // Getter and Setter for status
    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    // Getter and Setter for total_price
    public function getTotalPrice() {
        return $this->total_price;
    }

    public function setTotalPrice($total_price) {
        $this->total_price = $total_price;
    }

    // Getter and Setter for payment_method
    public function getPaymentMethod() {
        return $this->payment_method;
    }

    public function setPaymentMethod($payment_method) {
        $this->payment_method = $payment_method;
    }

    // Getter and Setter for payment_status
    public function getPaymentStatus() {
        return $this->payment_status;
    }

    public function setPaymentStatus($payment_status) {
        $this->payment_status = $payment_status;
    }

    // Getter and Setter for payment_time
    public function getPaymentTime() {
        return $this->payment_time;
    }

    public function setPaymentTime($payment_time) {
        $this->payment_time = $payment_time;
    }

    // Getter and Setter for items
    public function getItems() {
        return $this->items;
    }

    public function setItems($items) {
        $this->items = $items;
    }

    public function __toString() {
        return "Order: {$this->id}\n";
      }

    public static function create($table_id, $cartItems) {
        global $conn;
    
        $conn->begin_transaction();
        try {
            // Tạo order
            $sql = "INSERT INTO orders (table_id, status) VALUES (?, 'pending')";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Failed to prepare order insert statement: " . $conn->error);
            }
            $stmt->bind_param("d", $table_id);
            if (!$stmt->execute()) {
                throw new Exception("Failed to execute order insert statement: " . $stmt->error);
            }
            $orderId = $stmt->insert_id;
    
            // Tạo order items
            $sql = "INSERT INTO order_items (order_id, food_id, quantity, price) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt) {
                throw new Exception("Failed to prepare order items insert statement: " . $conn->error);
            }
    
            foreach ($cartItems as $item) {
                $stmt->bind_param("iiii", $orderId, $item['id'], $item['quantity'], $item['price']);
                if (!$stmt->execute()) {
                    throw new Exception("Failed to insert order item for food_id " . $item['id'] . ": " . $stmt->error);
                }
            }
    
            // Commit transaction
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
        $sql = "SELECT o.order_id, o.table_id, o.status, SUM(oi.quantity * oi.price) AS total_price FROM orders o
                INNER JOIN order_items oi ON o.order_id = oi.order_id
                WHERE o.status = 'pending'
                GROUP BY o.order_id, o.table_id, o.status;";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $orders = [];

            // Lặp qua các order
            while ($row = $result->fetch_assoc()) {
                $order = new Order();
                $order->id = $row['order_id'];
                $order->setTableId($row['table_id']);
                $order->setTableId($row['table_id']);
                $order->total_price = $row['total_price'];
                $order->status = $row['status'];
                $order->items = [];

                // Lấy chi tiết các món ăn trong order
                $sql_items = "SELECT oi.food_id, oi.quantity, oi.price, f.name AS food_name FROM order_items oi
                                INNER JOIN foods f ON f.food_id = oi.food_id
                                WHERE order_id = ?";
                    
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
        $sql = "SELECT o.order_id, o.table_id, o.status, o.payment_method, o.payment_status, o.payment_time, SUM(oi.quantity * oi.price) AS total_price FROM orders o
                LEFT JOIN order_items oi ON o.order_id = oi.order_id
                WHERE o.order_id = ?
                GROUP BY o.order_id, o.table_id, o.status, o.payment_method, o.payment_status, o.payment_time;";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $order_row = $result->fetch_assoc();
            $order = new Order();
            $order->id = $order_row['order_id'];
            $order->setTableId($order_row['table_id']);
            $order->total_price = $order_row['total_price'];
            $order->status = $order_row['status'];
            $order->setPaymentMethod($order_row['payment_method']);
            $order->setPaymentStatus($order_row['payment_status']);
            $order->setPaymentTime($order_row['payment_time']);
            $order->items = [];

            // Lấy chi tiết các món ăn từ bảng order_items
            $sql_items = "SELECT  f.food_id, f.name, f.image_url, oi.quantity, oi.price 
                        FROM order_items oi
                        INNER JOIN foods f ON f.food_id = oi.food_id
                        WHERE order_id = ?";
                        
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

    static public function pay($order_id, $payment_method) {
        global $conn;
        $sql = "UPDATE orders
                SET payment_method = ?, payment_status = 'paid', payment_time = NOW()
                WHERE order_id = ?;";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: ". $conn->error);
        }
        $stmt->bind_param("si", $payment_method, $order_id);
        return $stmt->execute();
    }
}
?>