<?php
require_once 'controllers/BaseController.php';


class DashboardController extends BaseController {
    function __construct() {

    }
    public function index() {
        $this->render('admin/dashboard', []);
    }
}
?>