<?php
declare(strict_types=1);
namespace Domain\managers;

use Domain\model\PDI;
use ManagementInterface;
use PdiMetierInterface;

require_once ("src/Domain/model/PDI.php");
require_once("src/interfaces/PdiMetierInterface.php");
require_once("src/interfaces/ManagementInterface.php");
require_once ("src/Domain/managers/AbstractManager.php");

class PdiManager extends AbstractManager implements ManagementInterface, PdiMetierInterface
{
    /**
     * @param int $id
     * @param string $subsistance
     * @return void
     * ajouter un moyen de subsistance a un PDI
     */
    public function addMoyenSubsistance(int $id, string $subsistance): void
    {
        /**
         * convertir en majiscule le moyen de subsistance
         */
        $subsistance = strtoupper($subsistance);
        /**
         * rechercher son identifiant
         */
        $spubSql = "select id_sub  from subsistance where UPPER(libele) =?";
        $querySub = $this->connection->prepare($spubSql);
        $querySub->execute([$subsistance]);
        $idSub = $querySub->fetch();
        $idSub = (int)$idSub['id_sub'];

        /**
         * inserer l'id du PDI et de la subsistance dans la table de jointure
         * (subsistance_pdi)
         */
        $sql = "insert into subsistance_pdi(id_pdi,id_sub) values(?,?)";
        $query = $this->connection->prepare($sql);
        $query->execute(array($id, $idSub));

    }

    //afficher le nombre de Pdi Par region
    public function afficherPdiByRegions(): array
    {
        $dataArray = [];
        $sql = "select count(*) as nombrePdi,lieu_origine from pdi 
          group by lieu_origine";
        $query = $this->connection->prepare($sql);
        $query->execute();
        while ($data = $query->fetch()) {
            $arr = [
                "region" => $data["lieu_origine"],
                "nombrePdi" => $data["nombrePdi"]
            ];
            $dataArray[] = $arr;
        }
        return $dataArray;
    }

    /**
     * @param string $origine
     * @return mixed
     * afficher le nombre de PDI d'une region passé en paramètre
     */
    public function afficherPdiParRegion(string $origine)
    {
        //convertir la region en majiscule
        $origine = strtoupper($origine);
        $sql = "select count(*) as nombrePdi from pdi where upper(lieu_origine)=:lieu_origine";
        $query = $this->connection->prepare($sql);
        $query->bindParam(":lieu_origine", $origine);
        $query->execute();
        return $query->fetch();
    }

    /**
     * afficher la liste des personnes déplacés Internes Femmes
     * @return int
     */
    public function getPdisTotalFemmes(): int
    {
        $sql = "select count(*) as femmes  from pdi where sexe='F'";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result['femmes'];
    }

    /**
     * @return int
     * afficher le nombre total de PDI hommes
     */
    public function getPdisTotalHommmes(): int
    {
        $sql = "select count(*) as hommes from pdi where sexe='M'";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result['hommes'];
    }

    /**
     * @return int
     * obtenir le nombre d'enfants PDI
     */
    public function getPDIsTotalEnfants(): int
    {
        $sql = "SELECT COUNT(*) AS nombre_personnes_mineures
        FROM pdi
        WHERE YEAR(CURRENT_DATE()) - YEAR(date_naiss) < 18";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $res = $query->fetch();
        return $res['nombre_personnes_mineures'];
    }

    /**
     * @return int
     * afficher le nombre total de PDI enregistrés dans la base de donnée
     */
    public function getTotalPDI(): int
    {
        $sql = "select count(*) as total from pdi";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $result = $query->fetch();
        return $result['total'];
    }

    /**
     * @param $entity
     * @return void
     * ajouter un PDI
     */
    public function addEntity($entity): void
    {
        $sql = "insert into pdi(nom,prenom,lieu_origine,sexe,telephone,email,
      localisation,nationalite,date_naiss,activite) 
     values (?,?,?,?,?,?,?,?,?,?)";
        $query = $this->connection->prepare($sql);
        $query->execute([
            $entity->getNom(),
            $entity->getPrenom(),
            $entity->getLieuOrigine(),
            $entity->getSexe(),
            $entity->getTelephone(),
            $entity->getEmail(),
            $entity->getLocalisation(),
            $entity->getNationalite(),
            $entity->getDateNais(),
            $entity->getActivite()
        ]);
    }

    /**
     * @param int $id
     * @return void
     * supprimer un PDI par son identifiant
     */
    public function deleteEntityByID(int $id): void
    {
        $sql = "delete from pdi where id_pdi=:id_pdi";
        $query = $this->connection->prepare($sql);
        $query->bindParam(":id_pdi", $id);
        $query->execute();
    }

    /**
     * @param int $id
     * @return mixed
     * renvoyer un pdi par son Identifiant
     */
    public function getEntityByID(int $id)
    {
        $sql = "select * from pdi where id_pdi=?";
        $query = $this->connection->prepare($sql);
        $query->bindParam(1, $id, \PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @return array
     * renvoyer la liste des PDI
     */
    public function getEntityList(): array
    {
        $sql = "select * from pdi";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $pdiObjList = [];

        while ($pdi = $query->fetch()) {
            $pdiObjList[] = new PDI(
                $pdi['nom'],
                $pdi['prenom'],
                $pdi['date_naiss'],
                $pdi['lieu_origine'],
                $pdi['sexe'],
                $pdi['nationalite'],
                $pdi['activite'],
                $pdi['localisation'],
                $pdi['email'],
                $pdi['telephone']
            );
        }

        return $pdiObjList;
    }
}
