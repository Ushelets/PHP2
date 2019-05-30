<?php
use Twig\TwigFunction;

//require $_SERVER['DOCUMENT_ROOT'] . '/configs/data.php';
require $_SERVER['DOCUMENT_ROOT'] . '/configs/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

error_reporting(E_ERROR | E_PARSE);

$loader = new Twig_Loader_Filesystem($_SERVER['DOCUMENT_ROOT'] . '/Templates');

$twig = new Twig_Environment($loader, [
    'cache' => 'compilation_cache',
    'auto_reload' => true,
    'debug' => true,
]);

$twig->addExtension(new Twig_Extension_Debug());
