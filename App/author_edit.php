<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

use \App\Models\Author; ?>
<!doctype html>
<html lang="en">

<head>
    <title>Редактирование автора</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <?php
    if (isset($_POST['save'])) {
        ?>
        <form action="/Templates/author_one.php" method="post" enctype="multipart/form-data">
            <?php
            foreach ($_POST['select']  as $val_post) {
                foreach ($_SESSION['name_auth'] as $key_session => $val_session) {
                    if ($val_session == $val_post) {
                        $edt[] = $key_session;
                        echo "<em>новое имя: </em><br> <textarea name='name_auth' cols='120' rows='1' wrap='hard'>$val_session</textarea>" . '<br>' . '<br>';
                    }
                }

                foreach ($edt as $key => $value) {
                    foreach ($_SESSION['surname_auth'] as $key_sur => $value_sur) {
                        if ($key_sur == $value) {
                            echo "<em>новая фамилия : </em><br> <textarea name='surname_auth' cols='120' rows='1' wrap='hard'>$value_sur</textarea>" . '<br>' . '<br>';
                        }
                    }
                    foreach ($_SESSION['email_auth'] as $key_eml => $value_eml) {
                        if ($key_eml == $value) {
                            echo "<em>новая электронная почта: </em><br> <textarea name='email_auth' cols='120' rows='1' wrap='hard'>$value_eml</textarea>" . '<br>' . '<br>';
                        }
                    }
                    foreach ($_SESSION['password_auth'] as $key_psw => $value_psw) {
                        if ($key_psw == $value) {
                            echo "<em>новый пароль: </em><br> <input type='password' placeholder='new password' maxlength='50' size='120' name='password_auth'>" . '<br>' . '<br>';
                        }
                    }
                    foreach ($_SESSION['id_auth'] as $key_id => $value_id) {
                        if ($key_id == $value) {
                            $_SESSION['id_chng'] = $value_id;
                        }
                    }
                }
            } ?>
            <button type="submit" class="btn btn-primary" name="save_chng">Сохранить изменения</button>
            <br><br>
        </form>
    <?php
    } elseif (isset($_POST['delete'])) {

        foreach ($_SESSION['author'] as $key => $value) {
            if ($value['name'] == $_POST['select'][0]) {
                $author = new Author;
                $author->delete($value['id']);
            }
        }
        echo "

        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_template.php'>
        </head>";
        die;
    } elseif (isset($_POST['add'])) {
        $author = new Author;
        $name = $_POST['name_auth'];
        $surname = $_POST['surname_auth'];
        $email = $_POST['email_auth'];
        $password = password_hash($_POST['password_auth'], PASSWORD_DEFAULT);
        $_SESSION['psw_auth'] = $password;
        $author->name = "$name";
        $author->surname = "$surname";
        $author->email = "$email";
        $author->password = "$password";
        $author->insert();

        echo "
        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_template.php'>
        </head>";
        die;
    };
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Возврат</a>';

    ?>
</body>

</html>
