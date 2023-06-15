<?php
require_once ("src/db/Connection.php");
require_once ("src/managers/BesoinManager.php");
require_once ("src/model/Admin.php");
require_once ("src/model/AgentEnregistrement.php");

$connect=new Connection();
$connection=$connect->getConnection();
$agent=new AgentEnregistrement("OSAIS","1234");
var_dump($agent->getPdiList());
