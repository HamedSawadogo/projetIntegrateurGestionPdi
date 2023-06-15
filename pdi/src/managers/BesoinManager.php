<?php
require_once ("src/interfaces/BesoinInterface.php");
require_once ("src/db/Connection.php");

class BesoinManager implements  BesoinInterface
{
   private \PDO $connection;

   public  function  __construct(\PDO $connection)
   {
       $this->connection=$connection;
   }
    /**
     * @param int $pdiId
     * @param string $besoin
     * @return void
     * ajouter un bésoin a un PDI
     */
    public  function  addBesoin(int $pdiId,string $besoin):void{
        $sql="select * from besoin where UPPER(nom)=?";
        $query=$this->connection->prepare($sql);
        $query->bindParam(1,$besoin,PDO::PARAM_STR);
        $query->execute();
        $result=$query->execute();
        
        if($result){
            $besoinId=$this->connection->lastInsertId();
            var_dump($besoinId);
            $sqlbesoin="insert into besoin_pdi(id_besoin,id_pdi)
           values(?,?)";
            $besoinQuery=$this->connection->prepare($sqlbesoin);
            $besoinQuery->bindParam(1,$besoinId);
            $besoinQuery->bindParam(2,$pdiId);
            $besoinQuery->execute();
        }
    }
    /**
     * @param string $besoinLibele
     * @return int
     */
    public function getPdiByBesoin(string $besoinLibele):int
    {
        $sql="select count(besoin_pdi.id_pdi) as total from pdi,besoin,besoin_pdi 
        where besoin_pdi.id_pdi=pdi.id_besoin
        AND besoin.nom=?";
        $query=$this->connection->prepare($sql);
        $query->execute([$besoinLibele]);

        var_dump($query->fetch());
        return 0;
    }
}