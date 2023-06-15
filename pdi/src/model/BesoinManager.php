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
     * @param Besoin $besoin
     * @return void
     * ajouter un  bésoin a la liste des bésoins
     */
    public function addBesoin(Besoin $besoin):void
    {
        $sql="insert into besoin(libele) values(?)";
        $query=$this->connection->prepare($sql);
        $query->execute([$besoin->getBesoin()]);
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