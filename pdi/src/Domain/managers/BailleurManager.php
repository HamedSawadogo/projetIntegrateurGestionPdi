<?php

namespace Domain\managers;

use ManagementInterface;

require_once("src/interfaces/ManagementInterface.php");
require_once("src/interfaces/BailleurInterface.php");
require_once("AbstractManager.php");

class BailleurManager extends AbstractManager implements ManagementInterface
{

    public function __construct()
    {
    }

    public function financerSecteur(int $id, string $secteur, $montant): void
    {
        $sql = "insert into financement(montant,bailleur_id) values (?,?)";
        $query = $this->connection->prepare($sql);
        $query->execute([$montant, $id]);
        $financeid = $this->connection->lastInsertId();


        $sqlSect = "select id from secteur where secteur=?";
        $querySect = $this->connection->prepare($sqlSect);
        $querySect->execute([$secteur]);
        $idSecteur = $this->connection->lastInsertId();


        $sqlInsert = "insert into secteur_finacment(secteur_id,financement_id)
        values (?,?)";
        $sqlFinace = $this->connection->prepare($sqlInsert);
        $sqlFinace->execute([$idSecteur, $financeid]);
    }

    public function addEntity($entity): void
    {
        /**
         * inserer un bailleur dans la base de donnée
         */
        $sql = "insert into  bailleur(nom,type_bailleur) values(?,?)";
        $query = $this->connection->prepare($sql);
        $query->execute(array($entity->getNom(), $entity->getTypeBailleur()));

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
            $entity->getAdresse()->getEmail(),
            $entity->getAdresse()->getTelephone(),
            $bailleurId
        ]);
    }

    /**
     * @throws \exceptions\InvalidIdentifiantException
     */
    public function deleteEntityByID(int $id): void
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
     * @throws \exceptions\InvalidIdentifiantException
     */
    public function getEntityByID(int $id)
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

    public function getEntityList(): array
    {
        return [];
    }
}