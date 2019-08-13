<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

use \App\Models\Author;

if (isset($_POST['save_chng'])) {
    $author = new Author;
    $name = $_POST['name_auth'];
    $surname = $_POST['surname_auth'];
    $email = $_POST['email_auth'];
    $password = password_hash($_POST['password_auth'], PASSWORD_DEFAULT);
    $author->name = "$name";
    $author->surname = "$surname";
    $author->email = "$email";
    $author->password = "$password";
    $author->update($_SESSION['id_chng']);
    echo "
        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/index.php'>
        </head>";
    die;
}

echo '<a href="../index.php"> Возврат </a>';
