
<?php
require_once('controllers/base_controller.php');
require_once('models/account.php');

class AccountsController extends BaseController
{
    private $_account;

    function __construct()
    {
        $this->folder = 'pages';
        $this->_account = new Account();
    }

    public function signup()
    {
        $errors = [];
        $flag = "";
        if (isset($_POST['submit'])) {
            if ($_POST['username'] == null | empty($_POST['username'])) {
                $errors[] = 'Vui lòng nhập username.';
            }
            if ($_POST['password'] == null || empty($_POST['password'])) {
                $errors[] = 'Vui lòng nhập mật khẩu.';
            }

            if ($_POST['email'] == null || empty($_POST['email'])) {
                $errors[] = 'Vui lòng nhập email.';
            }

            if ($_POST['phone'] == null || empty($_POST['phone'])) {
                $errors[] = 'Vui lòng nhập số điện thoại.';
            }

            if ($_POST['address'] == null || empty($_POST['address'])) {
                $errors[] = 'Vui lòng nhập địa chỉ.';
            }

            if (count($errors) == 0) {

                $username = trim($_POST['username']);

                $password = trim($_POST['password']);

                $email = trim($_POST['email']);

                $phone     = trim($_POST['phone']);

                $address = trim($_POST['address']);

                if (!is_numeric($phone)) {
                    $errors[] = 'Số điện thoại không hợp lệ';
                }

                if (strlen($password) > 15) {
                    $errors[] = 'Mật khẩu chỉ được tối đa 15 kí tự';
                }

                $emailCheck  = $this->_account->checkEmail($email);

                if ($emailCheck) {
                    $errors[] = 'Email đã tồn tại';
                } else {
                    $result = $this->_account->signUp($username, $email, $phone, $address);
                    if ($result) {

                        $flag = 'Thêm thành công.';
                    } else {

                        $errors[] = 'Xảy ra lỗi, không thể thêm admin';
                    }
                }
            }
        }

        $data = [
            'errors' => $errors,
            'flag' => $flag
        ];
        $this->render('signup', $data);
    }

    public function error()
    {
        $this->render('error');
    }
}
