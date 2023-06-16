<?php


if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['role'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $role=$_POST['role'];

    var_dump($username);
    var_dump($password);
    var_dump($role);
}
?>