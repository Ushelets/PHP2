<!doctype html>
<html lang="en">

<head>
    <title>Авторы</title>
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

    <style>
        .text {
            text-align: center;
        }
    </style>
    <div class="text">
        <u>
            <h2>АВТОРЫ</h2>
        </u>
    </div>
    <br>

    <?php require dirname(__DIR__, 1) . '/App/autoload.php'; ?>
    <form id="athr_edit" action="/App/author_edit.php" method="post" enctype="multipart/form-data">
        <?php
        //krsort($data);
        //$data_slice = array_slice($data, 0, 3);

        //foreach ($this->data['articles'] as $val) {

        /** @var \App\View $this */

        foreach ($this->authors as $val) {
            $id = $val->id;
            $name = $val->name;
            $surname = $val->surname;
            $email = $val->email;
            $password = $val->password;
            $id_arr[] = $id;
            $name_arr[] = $name;
            $surname_arr[] = $surname;
            $email_arr[] = $email;
            $password_arr[] = $password;
            $author[] = ['id' => $id, 'name' => $name, 'surname' => $surname, 'email' => $email, 'password' => $password];

            if ($id == $_SESSION['id']) {
                echo '
                <label class="btn btn-primary">
                <input type="radio" name="select[]" value="' . $name . '">
            </label>&nbsp';

                echo '<article style = "border: 1px dotted darkgrey; margin-bottom: 5px;">' . $name . '&nbsp&nbsp' . $surname . '&nbsp&nbsp' . $email . '</article>' . '<br>';
                $_SESSION['id'] = 0;
            }
        }
        $_SESSION['id_auth'] = $id_arr;
        $_SESSION['name_auth'] = $name_arr;
        $_SESSION['surname_auth'] = $surname_arr;
        $_SESSION['email_auth'] = $email_arr;
        $_SESSION['password_auth'] = $password_arr;
        $_SESSION['author'] = $author;

        ?>
        <button type="submit" class="btn btn-warning" name="save">Изменить</button>
        <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
    </form>
    <br>
    <a href="../index.php"> Возврат </a>

</body>

</html>
