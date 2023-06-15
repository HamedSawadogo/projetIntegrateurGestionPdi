<?php

interface BesoinInterface
{
    public  function  addBesoin(int $pdiId,string $besoin):void;
    public  function  getPdiByBesoin(string  $besoinLibele):int;

}