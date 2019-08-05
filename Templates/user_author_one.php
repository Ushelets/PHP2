<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

use \App\Models\User;
use \App\Models\Author;

if (isset($_POST['save_chng'])) {
    $user = new User;
    $author = new Author;
    $name_usr = $_POST['name_usr'];
    $surname_usr = $_POST['surname_usr'];
    $email_usr = $_POST['email_usr'];
    $password_usr = $_POST['password_usr'];
    $name_auth = $_POST['name_auth'];
    $surname_auth = $_POST['surname_auth'];
    $email_auth = $_POST['email_auth'];
    $password_auth = $_POST['password_auth'];
    $user->name = "$name_usr";
    $user->surname = "$surname_usr";
    $user->email = "$email_usr";
    $user->password = "$password_usr";
    $user->update($_SESSION['id_chng_usr']);
    $author->name = "$name_auth";
    $author->surname = "$surname_auth";
    $author->email = "$email_auth";
    $author->password = "$password_auth";
    $author->update($_SESSION['id_chng_auth']);
    echo "

        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_template.php'>
        </head>";
    die;
}

echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Возврат</a>';
