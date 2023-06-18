<?php
namespace Domain\managers;

class BesoinManager extends AbstractManager
{
    /**
     * @param int $pdiId
     * @param string $besoin
     * @return void
     * ajouter un bésoin a un PDI
     */
    public function addBesoin(int $pdiId, string $besoin): void
    {
        $sql = "select id from besoin where UPPER(nom)=?";
        $query = $this->connection->prepare($sql);
        $query->bindParam(1, $besoin, PDO::PARAM_STR);
        $query->execute();
        $besoinGeted = $query->fetch();
        $besoinId = (int)$besoinGeted['id'];
        $result = $query->execute();

        if ($result) {
            var_dump($besoinId);
            $sqlbesoin = "insert into besoin_pdi(id_besoin,id_pdi)
           values(?,?)";
            $besoinQuery = $this->connection->prepare($sqlbesoin);
            $besoinQuery->bindParam(1, $besoinId);
            $besoinQuery->bindParam(2, $pdiId);
            $besoinQuery->execute();
        }
    }

    /**
     * @param string $besoinLibele
     * @return int
     * afficher le nombre de PDI par besoin
     */
    public function getBesoinsListByPdi(): array
    {
        $sql = "select count(*) as total,b.nom  from pdi p,besoin b,besoin_pdi  bp
        where bp.id_pdi=p.id_pdi AND bp.id_besoin=b.id
        GROUP BY  b.nom";

        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    /**
     * @return array
     * envoyer la liste des bésoins
     */
    public function getEntityList(): array
    {
        $sql = "select * from besoin";
        $query = $this->connection->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
