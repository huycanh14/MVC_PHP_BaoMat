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

    function checkPassword($password, $account_id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE account_id = :account_id ORDER BY created_at DESC LIMIT 0, 1";
        $query = $this->_conn->prepare($sql);

        $query->bindValue(':account_id', (int)$account_id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
