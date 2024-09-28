<?php
require_once 'models/Food.php';

class Cart {
    public static function addToCart($food_id, $quantity = 1) {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

        if(isset($cart[$food_id])) {
            $cart[$food_id]['quantity'] += $quantity;
        } else {
            $food = Food::findById($food_id);
            if ($food) {
                $cart[$food_id] = [
                    'id' => $food->getId(),
                    'name' => $food->getName(),
                    'price' => $food->getPrice(),
                    'quantity' => $quantity,
                ];
            }
        }
        $_SESSION['cart'] = $cart;

    }

    public static function getCart() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    public static function removeFromCart($foodId) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['cart'][$foodId])) {
            unset($_SESSION['cart'][$foodId]);
        }
    }

    public static function clearCart() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Xóa toàn bộ giỏ hàng
        unset($_SESSION['cart']);
    }
}
?>