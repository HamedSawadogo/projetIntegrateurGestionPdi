<?php

require_once ("src/db/Connection.php");

class ConnectionManager
{
    private static  $connection;

    public function __construct()
    {
        $connect=new Connection();
        self::$connection=$connect->getConnection();
    }

    public  function  existUser(string $username){
        $sql="select * from user where username=:username";
        $query=self::$connection->prepare($sql);
        $query->bindValue(":username",$username);

        $query->execute();
        if($query->rowCount()==1){
            return $query->fetch(PDO::FETCH_ASSOC);
        }
    }
    public static function  countuser(){
         return "";
    }
}