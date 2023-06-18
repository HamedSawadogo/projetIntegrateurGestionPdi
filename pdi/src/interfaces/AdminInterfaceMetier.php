<?php

use Domain\model\Utilisateur;

interface AdminInterfaceMetier
{
    public  function  addUser($user):void;
    public  function  deleteUser(int $id):void;
    public  function  getUserById(int $id);
    public  function  getUserList():array;

}