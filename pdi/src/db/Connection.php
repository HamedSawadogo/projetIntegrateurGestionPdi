<?php
/**
 * onbtenir la connection a la base de donnée
 * patern SIngleton
 */
class Connection{

   private  static ?PDO $connection=null;
   private const  HOST="localhost";
   private  const USER="root";
   private  const PASSWORD="";
   private  const DBNAME="pdi";
    /**
     * constructeur privé
     */
   private function __construct(){
      try {
           self::$connection=new  \PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME."",self::USER,self::PASSWORD);
           self::$connection->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ATTR_ERRMODE);
      } catch (\Exception $e) {
         die("Erreur:  ".$e->getMessage());
      }
   }
   /**
    * onbtenir la connection a la base de donnée
    * @return void
    */
   public  static function getConnection():?PDO{
      if(self::$connection==null){
          self::$connection=new self();
      }
      return self::$connection;
  }
}