<?php
session_start();
if(isset($_SESSION['username'])&&isset($_SESSION['role'])){
    session_destroy();
    header("location:../login.php");
    die();

}



