<?php

require_once("src/model/Utilisateur.php");
require_once("src/interfaces/AdminInterfaceMetier.php");
require_once("src/db/Connection.php");

class Admin implements AdminInterfaceMetier
{
    private PDO $connection;
    public function __construct()
    {
        $connect=new Connection();
        $connection=$connect->getConnection();

    }
    public function getUserType(): string
    {
        return "ADMIN";
    }
    /**
     * @param Utilisateur $pdi
     * @return void
     * ajouter un utilisateur dans la base de donnée
     */
    public function addUser(Utilisateur $user): void
    {
        $sql="insert into user(username,password,type) values (?,?,?)";
        $query=$this->connection->prepare($sql);
        $query->execute([
            $user->getUsername(),
            $this->hashPassword(),
            $user->getUserType()
        ]);
    }
    /**
     * @param int $userId
     * @return void
     * supprumier un utilisateur
     */
    public function deleteUser(int $id): void
    {
        $sql="delete from user where id=?";
        $query=$this->connection->prepare($sql);
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
    }
    /**
     * @return void
     * obtenir tout les utilisateurs dans la base de donnée
     */
    public function getUserList(): array
    {
        $sql="select * from user";
        $query=$this->connection->prepare($sql);
        $query->execute();
        $usersList=[];
        while ($data=$query->fetch()) {
            $usersList[]=$data;
        }
        return $usersList;
    }
    /**
     * @param int $id
     * @return mixed
     * obtenir un utilisateur par son id
     */
    public function getUserById(int $id)
    {
        $sql="select * from user where id=?";
        $query=$this->connection->prepare($sql);
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    }
}
