<?php

interface BesoinInterface
{
    public  function  addBesoin(Besoin  $besoin):void;
    public  function  getPdiByBesoin(string  $besoinLibele):int;

}