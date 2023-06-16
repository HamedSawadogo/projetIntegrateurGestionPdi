<?php
require_once ("../managers/PdiManager.php");


require_once("../templates/test.php");
class PdiController
{
    /**
     * @var PdiManager
     * gestion de l'injection de dépendence
     * utiliser des interfaces plutot que des classes
     */
    private PdiManager $manager;
    public function __construct()
    {
        $this->manager=new PdiManager();
    }

    /**
     * @var PdiManager
     * represente le model
     * c'est a dire la classe permettant de renvoyer des données relatives aux PDI
     */

    public  static  function  getPdiList(){
       // $pdiDataList=$ma
        $manager=new PdiManager();
    }

}