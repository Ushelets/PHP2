<?php

require dirname(__DIR__, 1) . '/autoload.php';

/* $view = new \App\View\View();

use App\Models\Author;

$data = Author::FindAll();

//$view->assign('articles', $data);
$view->authors = $data;

$view->display('author.php'); */

use App\Controllers\index_author_controller;

$cntrlr = new index_author_controller();
$cntrlr->Action();
