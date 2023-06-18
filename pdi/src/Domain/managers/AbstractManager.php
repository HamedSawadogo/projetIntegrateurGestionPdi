<?php
namespace Domain\managers;
use Connection;

require_once ("src/db/Connection.php");

abstract class AbstractManager
{
    protected \PDO $connection;

    public function __construct()
    {
        $connect = new Connection();
        $this->connection = $connect->getConnection();
    }

}