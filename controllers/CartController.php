<?php
require_once('controllers/BaseController.php');
require_once('models/Cart.php');

class CartController extends BaseController {
    function index() {
        $cart = Cart::getCart();
        $this->render('cart', ['cart' => $cart]);
    }

    function add() {
        $food_id = isset($_POST['food_id']) ? (int)$_POST['food_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        echo $quantity;
        Cart::addToCart($food_id, $quantity);

        header('Location: /cart');
    }

    function removeItem() {
        $food_id = $_GET['food_id'];
        Cart::removeFromCart($food_id);
        header('Location: /cart');
    }
}
