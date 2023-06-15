<?php

use managers\PdiManager;

require_once ("../model/PdiManager.php");


$connect=new Connection();
$manager=new PdiManager($connect->getConnection());

$data=$manager->getPdiList();

require_once ("src/templates/test.php");