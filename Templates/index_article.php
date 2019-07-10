<?php
require dirname(__DIR__, 1) . '/autoload.php';

/* $view = new \App\View\View();

use App\Models\Article;

$data = Article::FindAll();

//$view->assign('articles', $data);
$view->articles = $data;

$view->display('article.php'); */

use App\Controllers\index_article_controller;

$cntrlr = new index_article_controller;
$cntrlr->Action();
