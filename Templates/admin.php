<!doctype html>
<html lang="en">

<head>
    <title>Администратор</title>
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

    <?php require dirname(__DIR__, 1) . '/App/autoload.php'; ?>

    <style>
        .text {
            text-align: center;
        }
    </style>
    <div class="text">
        <u>
            <h2>АДМИНИСТРАТОРЫ</h2>
        </u>
    </div>
    <br>

    <form id="adm_edit" action="/App/admin_edit.php" method="post" enctype="multipart/form-data">
        <?php

        foreach ($this->admins_adm as $val) {
            $id_adm = $val->id;
            $name_adm = $val->name;
            $surname_adm = $val->surname;
            $email_adm = $val->email;
            $password_adm = $val->password;
            $id_arr_adm[] = $id_adm;
            $name_arr_adm[] = $name_adm;
            $surname_arr_adm[] = $surname_adm;
            $email_arr_adm[] = $email_adm;
            $password_arr_adm[] = $password_adm;
            $admin[] = ['id' => $id_adm, 'name' => $name_adm, 'surname' => $surname_adm, 'email' => $email_adm, 'password' => $password_adm];

            echo '
                <label class="btn btn-primary">
                <input type="radio" name="select_adm[]" value="' . $name_adm . '">
            </label>&nbsp';

            echo '<article style = "border: 1px dotted darkgrey; margin-bottom: 5px;">' . $name_adm . '&nbsp&nbsp' . $surname_adm . '&nbsp&nbsp' . $email_adm . '</article>' . '<br>';
        }
        $_SESSION['id_adm'] = $id_arr_adm;
        $_SESSION['name_adm'] = $name_arr_adm;
        $_SESSION['surname_adm'] = $surname_arr_adm;
        $_SESSION['email_adm'] = $email_arr_adm;
        $_SESSION['password_adm'] = $password_arr_adm;
        $_SESSION['admin'] = $admin;
        ?>
        <br>
        <div class="text">
            <u>
                <h2>ПОЛЬЗОВАТЕЛИ</h2>
            </u>
        </div>
        <br>

        <?php
        foreach ($this->admins_usr as $val) {
            $id_usr = $val->id;
            $name_usr = $val->name;
            $surname_usr = $val->surname;
            $email_usr = $val->email;
            $password_usr = $val->password;
            $id_arr_usr[] = $id_usr;
            $name_arr_usr[] = $name_usr;
            $surname_arr_usr[] = $surname_usr;
            $email_arr_usr[] = $email_usr;
            $password_arr_usr[] = $password_usr;
            $user[] = ['id' => $id_usr, 'name' => $name_usr, 'surname' => $surname_usr, 'email' => $email_usr, 'password' => $password_usr];

            echo '
                <label class="btn btn-primary">
                <input type="radio" name="select_usr[]" value="' . $name_usr . '">
            </label>&nbsp';

            echo '<article style = "border: 1px dotted darkgrey; margin-bottom: 5px;">' . $name_usr . '&nbsp&nbsp' . $surname_usr . '&nbsp&nbsp' . $email_usr . '</article>' . '<br>';
        }
        $_SESSION['id_usr'] = $id_arr_usr;
        $_SESSION['name_usr'] = $name_arr_usr;
        $_SESSION['surname_usr'] = $surname_arr_usr;
        $_SESSION['email_usr'] = $email_arr_usr;
        $_SESSION['password_usr'] = $password_arr_usr;
        $_SESSION['user'] = $user;

        ?>
        <br>
        <div class="text">
            <u>
                <h2>АВТОРЫ</h2>
            </u>
        </div>
        <br>
        <?php
        foreach ($this->admins_auth as $val) {
            $id_auth = $val->id;
            $name_auth = $val->name;
            $surname_auth = $val->surname;
            $email_auth = $val->email;
            $password_auth = $val->password;
            $id_arr_auth[] = $id_auth;
            $name_arr_auth[] = $name_auth;
            $surname_arr_auth[] = $surname_auth;
            $email_arr_auth[] = $email_auth;
            $password_arr_auth[] = $password_auth;
            $author[] = ['id' => $id_auth, 'name' => $name_auth, 'surname' => $surname_auth, 'email' => $email_auth, 'password' => $password_auth];

            echo '
                <label class="btn btn-primary">
                <input type="radio" name="select_auth[]" value="' . $name_auth . '">
            </label>&nbsp';

            echo '<article style = "border: 1px dotted darkgrey; margin-bottom: 5px;">' . $name_auth . '&nbsp&nbsp' . $surname_auth . '&nbsp&nbsp' . $email_auth . '</article>' . '<br>';
        }
        $_SESSION['id_auth'] = $id_arr_auth;
        $_SESSION['name_auth'] = $name_arr_auth;
        $_SESSION['surname_auth'] = $surname_arr_auth;
        $_SESSION['email_auth'] = $email_arr_auth;
        $_SESSION['password_auth'] = $password_arr_auth;
        $_SESSION['author'] = $author;

        ?>
        <button type="submit" class="btn btn-warning" name="save">Изменить</button>
        <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
    </form>
    <br>
    <table>
        <td bgcolor="#ffcc00"><i><b><a href="../Templates/index_template.php?var=news">&nbsp&nbspПросмотр новостей&nbsp&nbsp</a></b></i></td>
    </table>
    <br>
    <a href="../index.php"> Возврат </a>

</body>

</html>
<?php
