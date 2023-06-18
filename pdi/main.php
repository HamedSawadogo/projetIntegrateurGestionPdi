<?php

require_once("src/managers/PdiManager.php");
require_once("src/managers/SubsistanceManager.php");
require_once("src/managers/BesoinManager.php");
require_once("src/model/Admin.php");

$manager=new SubsistanceManager();

$pdiManger=new PdiManager();
$pdi=new  PDI(
    "Pare",
    "Ali",
    "1999-03-23",
    "KAYA",
    "M",
    "Burkinabé",
    "Eleveur",
    "BOBO",
    "pare34@gmail.com",
    "566373778"
);

var_dump($pdiManger->afficherPdiByRegions());
var_dump($pdiManger->getPdisTotalHommmes());

//$pdiManger->deleteEntityByID(15);
$besoinManager=new BesoinManager();

//var_dump($manager->getPdiSubistanceBySecteur());
//$pdiManger->addEntity($pdi);
