<?php
require dirname(__DIR__, 1) . '/autoload.php';

use App\Controllers\index_article_controller;

$cntrlr = new index_article_controller;
$cntrlr();
