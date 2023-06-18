<?php

use Domain\model\Bailleur;

interface BailleurInterface
{
  public  function  addBailleur(Bailleur $bailleur):void;
  public  function  deleteBailleurById(int $id):void;
  public  function  rechercherBailleurById(int $id);
}