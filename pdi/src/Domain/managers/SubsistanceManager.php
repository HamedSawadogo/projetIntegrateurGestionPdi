<?php

namespace Domain\managers;
use SubsistanceInterfaceMetier;

require_once("src/interfaces/SubsistanceInterfaceMetier.php");

class SubsistanceManager extends \Domain\managers\AbstractManager implements SubsistanceInterfaceMetier
{
    /**
     * @return array
     * envoyer la liste des moyens de subsistances displonibles
     */
    public function getSubsistanceList(): array
    {
        $sql = "select * from subsistance";
        $query = $this->connection->query($sql);
        $query->execute();
        return $query->fetchAll();
    }

    /**
     * @return array
     * afficher le nombre de pDI par moyen de subsistance
     */
    public function getPdiSubistanceBySecteur(): array
    {
        $sql = "select count(*) as totalPDI,s.libele  
        from pdi p,subsistance s,
        subsistance_pdi sp 
        where sp.id_pdi=p.id_pdi 
        and s.id_sub=sp.id_sub
        GROUP BY s.libele";
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}