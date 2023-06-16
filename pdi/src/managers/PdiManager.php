<?php

require_once("src/interfaces/PdiMetierInterface.php");
require_once("src/db/Connection.php");
require_once("src/model/PDI.php");
require_once ("AbstractManager.php");

class PdiManager extends AbstractManager implements PdiMetierInterface
{

     public function __construct()
     {
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
        $query->bindParam(":lieu_origine", $origine, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch();
    }

    /**
     * @param Pdi $pdi
     * @return void
     * ajouter un PDI dans la base de donnée
     */
    public function addPDI(Pdi $pdi): void
    {

        /**$sql="INSERT INTO pdi(activite, date_naiss, email,lieu_origine,localisation,nationalite,nom, prenom, sexe,telephone)
         * VALUES (?,?,?,?,?,?,?,?,?,?)";**/
        $sql = "insert into pdi(nom,prenom,lieu_origine,sexe,telephone,email,
      localisation,nationalite,date_naiss,activite) 
     values (?,?,?,?,?,?,?,?,?,?)";
        $query = $this->connection->prepare($sql);
        $query->execute([
            $pdi->getNom(),
            $pdi->getPrenom(),
            $pdi->getLieuOrigine(),
            $pdi->getSexe(),
            $pdi->getTelephone(),
            $pdi->getEmail(),
            $pdi->getLocalisation(),
            $pdi->getNationalite(),
            $pdi->getDateNais(),
            $pdi->getActivite()
        ]);
    }

    /**
     * @param int $id
     * @return mixed
     * obtenir un PDI par son ID
     */
    public function getPdiByID(int $id)
    {
        $sql = "select * from pdi where id_pdi=?";
        $query = $this->connection->prepare($sql);
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
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
     * @param int $id
     * @return void
     * supprimer un PDI par son identifiant
     */
    public function deletePDI(int $id): void
    {
        $sql = "delete from pdi where id_pdi=:id_pdi";
        $query = $this->connection->prepare($sql);
        $query->bindParam(":id_pdi", $id);
        $query->execute();
    }
    /**
     * @return array
     * renvoyer la liste des PDI
     */
    public function getPdiList(): array
    {
        $sql = "select * from pdi";
        $query = $this->connection->prepare($sql);
        $query->execute();
        $pdiObjList=[];

        while ($pdi=$query->fetch()) {
            $pdiObjList[]=new PDI(
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
}
