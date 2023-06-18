<?php

use Domain\managers\BesoinManager;
use Domain\managers\PdiManager;
use Domain\model\Admin;

require_once("src/Domain/managers/PdiManager.php");
require_once("src/Domain/managers/BesoinManager.php");
require_once("src/Domain/model/Admin.php");
require_once("src/Domain/managers/ConnectionManager.php");


$con=new \Domain\managers\ConnectionManager();
$manager=new PdiManager();
var_dump($manager);
