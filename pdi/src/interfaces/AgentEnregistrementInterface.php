<?php
require_once ("src/model/PDI.php");

interface AgentEnregistrementInterface
{
    public  function  addPDI(PDI  $pdi):void;
    public  function  deletePDI(int $id):void;
    public  function  getPdiByID(int $id);
    public  function  getPdiList():array;

}