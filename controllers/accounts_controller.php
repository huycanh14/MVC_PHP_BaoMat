<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<?php
// session_start();
require_once('controllers/base_controller.php');
require_once('models/account.php');
require_once('models/password.php');

class AccountsController extends BaseController
{
    private $_account;
    private $_password;

    function __construct()
    {
        $this->folder = 'pages';
        $this->_account = new Account();
        $this->_password = new Password();
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

                $password = trim($_POST['passwordsha1']);

                $email = trim($_POST['email']);

                $phone     = trim($_POST['phone']);

                $address = trim($_POST['address']);

                if (!is_numeric($phone)) {
                    $errors[] = 'Số điện thoại không hợp lệ';
                }

                $emailCheck  = $this->_account->checkEmail($email);

                if ($emailCheck) {
                    $errors[] = 'Email đã tồn tại';
                } else {
                    $result = $this->_account->signUp($username, $email, $phone, $address);
                    if ($result) {
                        $result = $this->_password->createPassword((int)$result, $password);
                        if ($result)
                            $flag = 'Đăng ký thành công.';
                        else $errors[] = 'Xảy ra lỗi, không thể đăng ký tài khoản';
                    } else {

                        $errors[] = 'Xảy ra lỗi, không thể đăng ký tài khoản';
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

    public function signin()
    {
        $errors = [];

        if (isset($_POST['submit'])) {

            if ($_POST['password'] == null || empty($_POST['password'])) {
                $errors[] = 'Vui lòng nhập mật khẩu.';
            }

            if ($_POST['email'] == null || empty($_POST['email'])) {
                $errors[] = 'Vui lòng nhập email.';
            }

            if (count($errors) == 0) {

                $password = trim($_POST['passwordsha1']);

                $email = trim($_POST['email']);

                $emailCheck  = $this->_account->getEmail($email);

                if ($emailCheck) {
                    $result = $this->_password->checkPassword($password, $emailCheck['id']);
                    if ($result) {
                        if ($result["password"] === $password) {
                            $_SESSION['user'] = ['username' => $emailCheck['email'], 'password' => $password];
                            header('Location: ?controller=home&action=index');
                        } else {
                            $errors[] = "Thông tin đăng nhập không đúng";
                        }
                    } else {
                        $errors[] = "Thông tin đăng nhập không đúng";
                    }
                } else {
                    $errors[] = 'Thông tin đăng nhập không đúng';
                }
            }
        }

        $data = [
            'errors' => $errors,
        ];
        $this->render('signin', $data);
    }

    public function error()
    {
        $this->render('error');
    }
}
