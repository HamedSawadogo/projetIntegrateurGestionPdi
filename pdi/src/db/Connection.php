<?php
/**
 * onbtenir la connection a la base de donnée
 * patern SIngleton
 */
class Connection{
 
   private  ?PDO $connection=null;
   private const  HOST="localhost";
   private  const USER="root";
   private  const PASSWORD="";
   private  const DBNAME="pdi";

    /**
     * constructeur privé
     */
   public function __construct(){
      try {
           $this->connection=new  \PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME."",self::USER,self::PASSWORD);
           $this->connection->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
      } catch (\Exception $e) {
         die("Erreur:  ".$e->getMessage());
      }
   }
   /**
    * onbtenir la connection a la base de donnée
    *
    * @return void
    */
   public  function getConnection():\PDO{
      return $this->connection;
  }
}