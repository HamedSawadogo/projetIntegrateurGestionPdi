<?php

use Domain\managers\ConnectionManager;

var_dump(__DIR__);
require_once("src/Domain/managers/ConnectionManager.php");

try {
    if(isset($_GET['action'])&&$_GET['action']!="") {
        if($_GET['action']=='post') {
            $manger=new ConnectionManager();
            if($manger->connectUser($_POST['username'], $_POST['password'], $_POST['role'])) {
                session_start();
                if($_POST['role']=="ADMIN") {
                    $_SESSION['username']=htmlspecialchars($_POST['username']);
                    $_SESSION['role']=htmlspecialchars($_POST['role']);
                    echo "connecté";
                }
            } else {

            }
        }
    } else {
        header("location:public/login.php");
    }
} catch (Exception $e) {
    die("Erreur:  ".$e->getMessage());
}
