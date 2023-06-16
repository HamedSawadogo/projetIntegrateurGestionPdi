<?php

require_once ("src/controller/PdiController.php");
require_once ("src/managers/ConnectionManager.php");


if(isset($_GET['action'])&&$_GET['action']!=""){
    if($_GET['action']=='post'){
        if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['role'])){
            $username=htmlspecialchars($_POST['username']) ;
            $password=htmlspecialchars($_POST['password']);
            $role=htmlspecialchars($_POST['role']);
            $connectionManager=new ConnectionManager();
             $result=$connectionManager->existUser($username);
             if($result){
                 $getedUername=$result['username'];
                 $geTedPassword=$result['password'];
                 $getTedRole=$result['type'];

                 $passwordHashed=hash("sha256",$password);
                if($username==$username  AND $role==$getTedRole AND  $geTedPassword==$passwordHashed){
                    //creation d'une session de l'utilisateur
                    if($role=="ADMIN"){
                        echo  "<h1>ESPACE ADMINISTRATEUR</h1>";
                    }else if($role=="AGENT_ENREGISTREMENT"){

                    }else if($role==="AGENT_GESTIONAIRE"){

                    }else if($role=="DECIDEUR"){

                    }
                }else{
                    header("location:src/templates/login.php?mess=err");
                }
             }
        }
    }

}

?>