<?php 
require_once 'Router.php';
require_once 'controllers/UserController.php';
require_once 'controllers/FoodController.php';
require_once 'controllers/CategoryController.php';

$router = new Router();
$router->get('/', UserController::class, 'index');

$router->get('/admin/login', UserController::class, 'login');
$router->post('/admin/login', UserController::class, 'login');

$router->get('/admin/users', UserController::class, 'index');
$router->post('/admin/users', UserController::class, 'addUser');
$router->get('/admin/logout', UserController::class, 'logout');

$router->get('/admin/foods', FoodController::class, 'index');
$router->get('/admin/foods', FoodController::class, 'create');
$router->post('/admin/foods/new', FoodController::class, 'create');

$router->get('/admin/categories', CategoryController::class, 'index');
$router->post('/admin/categories', CategoryController::class, 'create');
$router->delete('/admin/categories', CategoryController::class, 'delete');

$router->dispatch();

?>

