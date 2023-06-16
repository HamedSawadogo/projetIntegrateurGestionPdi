<?php
require_once ("src/managers/PdiManager.php");

class PdiController
{

    private  PdiManager $manager;
    public function __construct()
    {
       $this->manager=new PdiManager();
       var_dump($this->manager->getEntityList());
    }
    /**
     * @var PdiManager
     * represente le model
     * c'est a dire la classe permettant de renvoyer des données relatives aux PDI
     */
    public    function  homePage(){
       $data=$this->manager->getEntityList();
       var_dump($data);
    }
}