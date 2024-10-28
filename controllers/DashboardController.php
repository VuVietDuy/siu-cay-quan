<?php
require_once 'controllers/BaseController.php';
require_once 'models/Dashboard.php';

class DashboardController extends BaseController {
    function __construct() {

    }
    
    public function index() {
        $dashboard = Dashboard::getDashboard();
        $this->render('admin/dashboard', ['dashboard' => $dashboard]);

    }
}
?>