<?php

use Domain\model\Utilisateur;

interface UserMetierInterface
{
    public  function  addUser(Utilisateur $utilisateur);
    public  function  deleteUser(int $userId):void;
    public  function  updateUser(int $userId):void;
    public  function  getUserById(int $id);
    public  function  getAllUsers():array;
}