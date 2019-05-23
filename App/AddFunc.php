<?php

namespace App;

use App\AddWork;

//$add = new Addwork();

if ($_POST['name'] !== '' && $_POST['email'] !== '') {
    $email = $_POST['email'];
    $name = $_POST['name'];
            
            //$dbu = new Db();

    $query = "INSERT INTO  users ( name , email ) VALUES ($name, $email )";

    $add->insAll($query);
}

if ($_POST['h_article'] !== '' && $_POST['article'] !== '') {

    $title = $_POST['h_article'];
    $content = $_POST['article'];

            //$dba = new Db();

    $query = "INSERT INTO  news ( title , email ) VALUES ($title, $content )";

    $add->insAll($query);
}

echo "
        <html>
          <head>
           <meta http-equiv='Refresh' content='0; URL=http://php2/index.php'>
          </head>
        </html>";
