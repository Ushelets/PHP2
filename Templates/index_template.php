<?php
require dirname(__DIR__, 1) . '/autoload.php';

foreach ($_GET as $value) {
    if ($value == 'news') {
        $cntrlr = 'index_article_controller';
    } elseif ($value == 'authors') {
        $cntrlr = 'index_author_controller';
    }
}

//$cntrlr = $_GET['cntrlr'] ?? 'index_article_controller';
$class = "\App\Controllers\\$cntrlr";
/* use App\Controllers\index_article_controller;

$cntrlr = new index_article_controller(); */
$cntrlr = new $class();
$cntrlr();
