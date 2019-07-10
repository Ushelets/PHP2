<?php

require dirname(__DIR__, 1) . '/autoload.php';

use App\Controllers\index_author_controller;

$cntrlr = new index_author_controller;
$cntrlr();
