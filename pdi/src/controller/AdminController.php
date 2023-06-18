<?php

require_once("src/model/Admin.php");

class AdminController
{
    private Admin $manager;
    public function __construct()
    {
        $this->manager=new Admin();
    }
    /**
     * @var Admin
     * represente le model
     * c'est a dire la classe permettant de renvoyer des données relatives aux PDI
     */
    public function homePage()
    {
        $data=$this->manager->getUserList();
        var_dump($data);
    }
}
