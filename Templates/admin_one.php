<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

use \App\Models\Admin;
use \App\Models\User;
use \App\Models\Author;

if (isset($_POST['save_chng_adm'])) {
    $admin = new Admin;
    $name_admin = $_POST['name_admin'];
    $surname_admin = $_POST['surname_admin'];
    $email_admin = $_POST['email_admin'];
    $password_admin = $_POST['password_admin'];
    $admin->name = "$name_admin";
    $admin->surname = "$surname_admin";
    $admin->email = "$email_admin";
    $admin->password = "$password_admin";
    $admin->update($_SESSION['id_chng_admin']);
    echo "
        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/index.php'>
        </head>";
    die;
} elseif (isset($_POST['save_chng_usr'])) {
    $user = new User;
    $name_usr = $_POST['name_usr'];
    $surname_usr = $_POST['surname_usr'];
    $email_usr = $_POST['email_usr'];
    $password_usr = $_POST['password_usr'];
    $user->name = "$name_usr";
    $user->surname = "$surname_usr";
    $user->email = "$email_usr";
    $user->password = "$password_usr";
    $user->update($_SESSION['id_chng_usr']);
    echo "
        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/index.php'>
        </head>";
    die;
} elseif (isset($_POST['save_chng_auth'])) {
    $author = new Author;
    $name_auth = $_POST['name_auth'];
    $surname_auth = $_POST['surname_auth'];
    $email_auth = $_POST['email_auth'];
    $password_auth = $_POST['password_auth'];
    $author->name = "$name_auth";
    $author->surname = "$surname_auth";
    $author->email = "$email_auth";
    $author->password = "$password_auth";
    $author->update($_SESSION['id_chng_auth']);
    echo "
        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/index.php'>
        </head>";
    die;
}
echo '<a href="../index.php"> Возврат </a>';
