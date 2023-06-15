<?php
require_once ("src/interfaces/UserMetierInterface.php");
require_once ("src/db/Connection.php");

/**
 * hacher le mot de passe de l'utilisateur
 */
abstract class Utilisateur
{
  protected string  $username;
  protected string $password;
  protected string $type;
  protected  $connection;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->connection=Connection::getConnection();
    }

    //============================abstrac==========================================//
    public  abstract  function getUserType():string;

    /**
     * @param Utilisateur $utilisateur
     * @return void
     * ajouter un utilisateur dans la base de donnée
     */
    public  function  addUser(){
        $sql="insert into user(username,password,type) values (?,?,?)";
        $query=$this->connection->prepare($sql);
        $query->bindParam(1,$this->username,PDO::PARAM_STR);
      //  $query->bindParam(2,$this->hashPassword(),PDO::PARAM_STR);
       // $query->bindParam(3,$this->getUserType(),PDO::PARAM_STR);
        $query->execute();
    }

    /**
     * @param int $userId
     * @return void
     * supprumier un utilisateur
     */
    public  function  deleteUser(int $userId):void{
        $sql="delete from user where id=?";
        $query=$this->connection->prepare($query);
        $query->bindParam(1,$userId,PDO::PARAM_INT);
        $query->execute();
    }
    public  function  updateUser(int $userId):void{

    }
    /**
     * @param int $id
     * @return mixed
     * obtenir un utilisateur par son id
     */
    public  function  getUserById(int $id){
        $sql="select * from user where id=?";
        $query=$this->connection->prepare($query);
        $query->bindParam(1,$userId,PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * @return void
     * obtenir tout les utilisateurs dans la base de donnée
     */
    public  function  getAllUsers():array{
      $sql="select * from user";
      $query=$this->connection->prepare($sql);
      $query->execute();
      $usersList=[];
      while ($data=$query->fetch()){
          $usersList[]=$data;
      }
      return $usersList;
    }

    /**
     * @return string
     * hacher le mot de passe de l'utilisateur
     */
    public  function  hashPassword():string{
        return password_hash($this->password, PASSWORD_ARGON2I);
    }
    public  function  checkPassword():bool{
        if(strlen($this->password)>5){
            return  true;
        }
        return  false;
    }
    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}