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

     public  function  connectUser(string $username,string $password,string $role):bool
     {
         if (isset($username) && isset($password) && isset($role)) {
             $username = htmlspecialchars($username);
             $password = htmlspecialchars($password);
             $role = htmlspecialchars($role);

             $result = $this->existUser($username);
             if ($result) {
                 $getedUername = $result['username'];
                 $geTedPassword = $result['password'];
                 $getTedRole = $result['type'];

                 $passwordHashed = hash("sha256", $password);
                 if ($username == $username and $role == $getTedRole and $geTedPassword == $passwordHashed) {
                     return true;
                 } else {
                     return false;
                 }
             }
             return  false;
         }
         return  false;
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