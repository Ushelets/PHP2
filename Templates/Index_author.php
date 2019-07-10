<?php

//use App\Controllers\index_author_controller;

require dirname(__DIR__, 2) . '/autoload.php';

$cntrlr = new App\Controllers\index_author_controller();
$cntrlr->Action();
