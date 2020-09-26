<?php
require_once('models/model.php');
class Account extends Model
{

    protected $table = 'accounts';
    protected $primary_key = "id";
    protected $foreign_key = "";

    public $id;
    public $username;
    public $email;
    public $phone;
    public $address;
    public $start_delay;
    public $end_delay;

    function __construct()
    {
        parent::__construct();
    }

    function signUp($username, $email, $phone, $address)
    {
        $phone = (int)$phone;
        $sql = "INSERT INTO " . $this->table . " (username, email, phone, address) values (:username, :email, :phone, :address)";
        $query = $this->_conn->prepare($sql);

        $query->bindParam(':username', $username, PDO::PARAM_STR);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':phone', $phone, PDO::PARAM_INT);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->execute();
        // $result = $query->fetch();
        return $this->_conn->lastInsertId();
    }

    function checkEmail($email)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $query = $this->_conn->prepare($sql);
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        return $query->fetch() ? true : false;
    }
}
