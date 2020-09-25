
<?php
require_once('controllers/base_controller.php');

class AccountsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'pages';
    }

    public function signup()
    {
        $data = array(
            'name' => 'Sang Beo',
            'age' => 22
        );
        $this->render('signup', $data);
    }

    public function error()
    {
        $this->render('error');
    }
}
