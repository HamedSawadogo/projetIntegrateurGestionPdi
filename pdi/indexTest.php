<?php

require_once("src/controller/PdiController.php");
require_once("src/managers/ConnectionManager.php");


try {
    if(isset($_GET['action'])&&$_GET['action']!="") {
        if($_GET['action']=='post') {
            $manger=new ConnectionManager();
            if($manger->connectUser($_POST['username'],$_POST['password'],$_POST['role'])){
                session_start();
                if($_POST['role']=="ADMIN"){
                    $_SESSION['username']=htmlspecialchars($_POST['username']);
                    $_SESSION['role']=htmlspecialchars($_POST['role']);
                    header("location:src/templates/admin/index.php");
                }
            }else{
                header("location:src/templates/login.php?mess=err");
                exit(0);
            }
        }
    }else{

    }
}catch (Exception $e){
    die("Erreur:  ".$e->getMessage());
}

