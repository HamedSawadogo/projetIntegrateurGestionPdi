<?php

try {
    if(isset($_GET['action'])&&$_GET['action']!="") {
        if($_GET['action']=='post') {
            $manger=new ConnectionManager();
            if($manger->connectUser($_POST['username'], $_POST['password'], $_POST['role'])) {
                session_start();
                if($_POST['role']=="ADMIN") {
                    $_SESSION['username']=htmlspecialchars($_POST['username']);
                    $_SESSION['role']=htmlspecialchars($_POST['role']);
                    $admin=new AdminController();
                    $admin->homePage();
                    // require("src/templates/admin.php");
                    // header("location:src/templates/admin.php");
                }
            } else {

            }
        }
    } else {
        header("location:src/templates/login.php");
    }
} catch (Exception $e) {
    die("Erreur:  ".$e->getMessage());
}
