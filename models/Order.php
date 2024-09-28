<?php
class Order {
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
}
?>