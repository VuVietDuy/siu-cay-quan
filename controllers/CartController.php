<?php
require_once('controllers/BaseController.php');
require_once('models/Cart.php');

class CartController extends BaseController {
    function index() {
        $cart = Cart::getCart();
        $this->render('carts', ['cart' => $cart]);
    }

    function add() {
        echo "oke";
        $food_id = isset($_POST['food_id']) ? (int)$_POST['food_id'] : 0;
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
        
        Cart::addToCart($food_id, $quantity);

        header('Location: /carts');
    }
}
