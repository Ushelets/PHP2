<?php
spl_autoload_register(function ($class) {
    //require_once $_SERVER['DOCUMENT_ROOT'].'/'. str_replace('\\','/',$class) ".php";    
    //require __DIR__ . '/' . str_replace('\\', '/', $class) .'.class.php';   
    //require_once $_SERVER['DOCUMENT_ROOT']."/$class.class.php";    
    require $_SERVER['DOCUMENT_ROOT'] . "/$class.php";
    //require_once __DIR__."/$class.php";        
});
