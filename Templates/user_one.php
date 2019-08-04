<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

use \App\Models\User;

if (isset($_POST['save_chng'])) {
    $user = new User;
    $name = $_POST['name_usr'];
    $surname = $_POST['surname_usr'];
    $email = $_POST['email_usr'];
    $password = $_POST['password_usr'];
    $user->name = "$name";
    $user->surname = "$surname";
    $user->email = "$email";
    $user->password = "$password";
    $user->update($_SESSION['id_chng']);
    echo "

        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_template.php'>
        </head>";
    die;
}

echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Возврат</a>';
