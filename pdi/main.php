<?php
require_once ("src/db/Connection.php");
require_once ("src/managers/BesoinManager.php");
require_once ("src/model/Admin.php");
require_once ("src/model/AgentEnregistrement.php");

$connect=Connection::getConnection();

var_dump($connect);
$agent=new AgentEnregistrement("OSAIS","1234");
