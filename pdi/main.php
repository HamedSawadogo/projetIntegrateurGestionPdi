<?php

require_once ("src/db/Connection.php");
require_once ("src/model/PdiManager.php");
require_once("src/model/PDI.php");
require_once ("src/model/BesoinManager.php");

$connect=new Connection();
$manager=new PdiManager($connect->getConnection());

$besoinManager=new BesoinManager($connect->getConnection());
var_dump($besoinManager);

var_dump($besoinManager->getPdiByBesoin("alimentation"));
/**
$pdi=new PDI("Sanou","Mariam","1999-6-23",
"KAYA","F","Burkinabé","Commerçante",
    "OUaga","ali23@gmail.com",null);
echo  "total PDI enregistrés: ".$manager->getTotalPDI()."</br>";
echo  "Total PDI Hommes:  ".$manager->getPdisTotalHommmes()."</br>";
echo  "Total Femmes enregistrés  ".$manager->getPdisTotalFemmes();

var_dump($manager->afficherPdiParRegion("kaya"));
var_dump($manager->afficherPdiByRegions());
var_dump($manager->getPdiList());

//$manager->deletePDI(14);
var_dump($manager->getPdiByID(13));
**/