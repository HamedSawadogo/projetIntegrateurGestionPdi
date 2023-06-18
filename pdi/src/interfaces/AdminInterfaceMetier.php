<?php

interface AdminInterfaceMetier
{
    public  function  addUser(\Domain\model\Utilisateur $user):void;
    public  function  deleteUser(int $id):void;
    public  function  getUserById(int $id);
    public  function  getUserList():array;

}