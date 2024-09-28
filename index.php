<?php 
require_once 'Router.php';
require_once 'controllers/UserController.php';
require_once 'controllers/FoodController.php';
require_once 'controllers/CategoryController.php';
require_once 'controllers/OrderController.php';
require_once 'controllers/MenuController.php';
require_once 'controllers/CartController.php';

$router = new Router();

$router->get('/admin/login', UserController::class, 'login');
$router->post('/admin/login', UserController::class, 'login');

$router->get('/admin/users', UserController::class, 'index');
$router->post('/admin/users', UserController::class, 'addUser');
$router->get('/admin/logout', UserController::class, 'logout');

$router->get('/admin/foods', FoodController::class, 'index');
$router->get('/admin/foods/new', FoodController::class, 'create');
$router->post('/admin/foods', FoodController::class, 'create');

$router->get('/admin/categories', CategoryController::class, 'index');
$router->post('/admin/categories', CategoryController::class, 'create');
$router->delete('/admin/categories', CategoryController::class, 'delete');

$router->get('/admin/orders', OrderController::class, 'index');

$router->get('/menu', MenuController::class, 'index');
$router->get('/menu/item', MenuController::class, 'show');

$router->post('/carts', CartController::class, 'add');
$router->get('/carts', CartController::class, 'index');

$router->post('/orders', OrderController::class, 'create');

$router->get('/admin/orders/detail', OrderController::class, 'show');


$router->dispatch();

?>



