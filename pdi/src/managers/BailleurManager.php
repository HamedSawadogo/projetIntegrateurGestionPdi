<?php

require_once("src/interfaces/BailleurInterface.php");

class BailleurManager implements BailleurInterface
{
    private \PDO $connection;
    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    /**
     * @param Bailleur $bailleur
     * @return void
     * ajouter un PDI dans la base de donnée et son adresee
     */
    public function addBailleur(Bailleur $bailleur): void
    {
        /**
         * inserer un bailleur dans la base de donnée
         */
        $sql = "insert into  bailleur(nom,type_bailleur) values(?,?)";
        $query = $this->connection->prepare($sql);
        $query->execute(array($bailleur->getNom(), $bailleur->getTypeBailleur()));

        /**
         * l'identifiant du bailleur enregistré
         *
         */
        $bailleurId = $this->connection->lastInsertId();
        /**
         * inserer son adresse dans la base de donnée
         */
        $sqlAdresse = "insert into adresse(email,telephone,bailleur_id) 
        values(?,?,?)";
        $queryAdress = $this->connection->prepare($sqlAdresse);
        $queryAdress->execute([
            $bailleur->getAdresse()->getEmail(),
            $bailleur->getAdresse()->getTelephone(),
            $bailleurId
        ]);
    }

    /**
     * @param int $id
     * @return void
     * supprimer un  bailleur de la base de donnée
     */
    public function deleteBailleurById(int $id): void
    {
        if ($id > 0) {
            $sql = "delete from bailleur where id=:id";
            $query = $this->connection->prepare($sql);
            $query->bindParam(":id", $id, PDO::PARAM_INT);
            $query->execute();
        } else {
            throw  new \exceptions\InvalidIdentifiantException();
        }
    }

    /**
     * @param int $id
     * @return void
     * @throws \exceptions\InvalidIdentifiantException
     * rechercher un bailleur par son identifiant
     */
    public function rechercherBailleurById(int $id)
    {
        if ($id > 0) {
            $sql = "select * from bailleur where id=?";
            $query = $this->connection->prepare($sql);
            $query->execute([$id]);
            return $query->fetch();
        } else {
            throw  new \exceptions\InvalidIdentifiantException();
        }

    }
}