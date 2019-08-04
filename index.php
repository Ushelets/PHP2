<!doctype html>
<html lang="en">

<head>
    <title>Авторизация</title>
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
        <b>
            <h2>
                <p>Авторизация</p>
            </h2>
        </b>
    </div>

    <form action="../App/user_edit.php" method="post" enctype="multipart/form-data">
        <b>
            <u>
                <p>Новый пользователь</p>
            </u>
        </b>

        <textarea name="name_usr" required placeholder="имя" cols="150" rows="1" wrap="hard" id=""></textarea>
        <br>
        <textarea name="surname_usr" required placeholder="фамилия" cols="150" rows="1" wrap="hard" id=""></textarea>
        <br>
        <input type="email" name="email_usr" required placeholder="e-mail" size="100">
        <br>
        <input type="password" name="password_usr" required placeholder="password" maxlength="50" size="50">
        <br><br>
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
    </form>

    <hr>
    <br>
    <form action="./App/author_edit.php" method="post" enctype="multipart/form-data">
        <b>
            <u>
                <p>Новый автор</p>
            </u>
        </b>
        <textarea name="name_auth" required placeholder="имя автора" cols="150" rows="1" wrap="hard"></textarea>
        <br>
        <textarea name="surname_auth" required placeholder="фамилия автора" cols="150" rows="1" wrap="hard"></textarea>
        <br>
        <input type="email" name="email_auth" required placeholder="e-mail" size="100">
        <br>
        <input type="password" required placeholder="password" maxlength="50" size="50" name="password_auth">
        <br><br>
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
    </form>
    <hr>
    <br>
    <form action="./Templates/index_template.php" method="post" enctype="multipart/form-data">
        <b><u>
                <p>Вы уже зарегистрированы</p>
            </u>
        </b>
        <input type="password" placeholder="введите пароль" maxlength="50" size="50" name="password_repeat">
        <br><br>
        <button type="submit" class="btn btn-primary" name="password_usr">Войти пользователю</button>
        <button type="submit" class="btn btn-primary" name="password_auth">Войти автору</button>
    </form>

</body>

</html>
