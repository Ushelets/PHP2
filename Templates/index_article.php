<?php
require dirname(__DIR__, 1) . '/autoload.php';

$view = new \App\View\View_article();

use App\Models\Article;

$data = Article::FindAll();

//$view->assign('articles', $data);
$view->articles = $data;

$view->display('article.php');
