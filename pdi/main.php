<?php

require_once("src/db/Connection.php");
require_once("src/managers/BesoinManager.php");
require_once("src/model/Admin.php");
require_once("src/model/AgentEnregistrement.php");

$connect=new Connection();
$connection=$connect->getConnection();
$agent=new AgentEnregistrement("Baga", "1234");
$admin=new Admin("Hamed", "1234");


$admin->addUser($admin);
$userList=$agent->getPdiList();

var_dump($userList);


require_once("src/templates/test.php");
