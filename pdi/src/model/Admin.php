<?php
require_once ("src/model/Utilisateur.php");


class Admin extends Utilisateur
{
    public function getUserType():string
    {
        return "ADMIN";
    }
}