<?php

interface PdiMetierInterface{
    public  function  addPDI(PDI  $pdi):void;
    public  function  deletePDI(int $id):void;
    public  function  getPdiByID(int $id);
    public  function  getPdisTotalFemmes():int;
    public  function  getPdisTotalHommmes():int;
    public  function  getPDIsTotalEnfants():int;
    public  function  getPdiList():array;
    public  function  getTotalPDI():int;
    public  function  afficherPdiByRegions():array;
}