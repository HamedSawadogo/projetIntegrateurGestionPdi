<?php
spl_autoload_register(function ($className){
    $path=str_replace("\\","/",$className).".php";
    var_dump("src/".$path);
    require_once ("src/".$path);
});