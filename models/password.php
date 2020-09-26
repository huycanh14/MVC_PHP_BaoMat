<?php
require_once('models/model.php');
class Password extends Model
{

    protected $table = 'passwords';
    protected $primary_key = "id";
    protected $foreign_key = "account_id";

    public $id;
    public $password;
    public $account_id;
    public $created_at;
    public $updated_at;
    function __construct()
    {
        parent::__construct();
    }

    function createPassword($account_id, $password)
    {
        $sql = "INSERT INTO " . $this->table . " (account_id, password) values (:account_id, :password)";
        $query = $this->_conn->prepare($sql);

        $query->bindParam(':account_id', $account_id, PDO::PARAM_STR);
        $query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->execute();
        return $this->_conn->lastInsertId();
    }
}
