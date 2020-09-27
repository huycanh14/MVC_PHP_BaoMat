<?php
require_once('controllers/base_controller.php');
// require_once('models/account.php');

class HomeController extends BaseController
{

    function __construct()
    {
        $this->folder = 'pages';
    }

    public function index()
    {
        $this->render('index');
    }
}
