<?php

/**header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST,GET,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 **/


require_once ("src/managers/PdiManager.php");

$manager=new PdiManager();
$pdiByRegions=$manager->afficherPdiByRegions();




if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $manager=new PdiManager();
    $pdiByRegions=$manager->afficherPdiByRegions();
    echo json_encode($pdiByRegions);
    http_response_code(201);
}
