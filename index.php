<?php

use App\Models as model;

require __DIR__ . '/autoload.php';
require __DIR__ . '/Templates/add.php';

//$dataAins =  name\Article::Insert();

$dataA = model\Article::FindAll();
$dataU = model\User::FindAll();

/* $usr = new model\User();
$usr->InsertUs();

$artcl = new model\Article();
$artcl->InsertArtc(); */

echo '<pre>';
var_dump($dataA);
echo '</pre>';
echo '<br>';
echo '<pre>';
var_dump($dataU);
echo '</pre>';
