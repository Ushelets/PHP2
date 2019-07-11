<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

if ($_GET['var'] == 'news') {
    $cntrlr = 'index_article_controller';
} else {
    $cntrlr = 'index_author_controller';
}

$class = "\App\Controllers\\$cntrlr";

$cntrlr = new $class();
$cntrlr();
