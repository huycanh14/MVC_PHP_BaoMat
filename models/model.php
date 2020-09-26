<?php
include_once 'connection.php';
class Model extends DB
{
    protected $table = "";
    protected $primary_key = "";
    protected $foreign_key = "";

    public function __construct()
    {
        parent::__construct();
    }
}
