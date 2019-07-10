<?php
require dirname(__DIR__, 1) . '/autoload.php';

use \App\Models\Author;

if (isset($_POST['save_chng'])) {
    $author = new Author;
    $name = $_POST['name_author'];
    $surname = $_POST['surname_author'];
    $author->name = "$name";
    $author->surname = "$surname";
    $author->update($_SESSION['id_chng']);
    echo "

        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_author.php'>
        </head>";
    die;
}

echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Возврат</a>';
