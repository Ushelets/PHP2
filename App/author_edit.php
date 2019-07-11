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
                foreach ($_SESSION['name'] as $key_session => $val_session) {
                    if ($val_session == $val_post) {
                        $edt[] = $key_session;
                        echo "<textarea name='name_author' cols='150' rows='2' wrap='hard'>$val_session</textarea>" . '<br>' . '<br>';
                    }
                }

                foreach ($edt as $key => $value) {
                    foreach ($_SESSION['surname'] as $key_sur => $value_sur) {
                        if ($key_sur == $value) {
                            echo "<textarea name='surname_author' cols='150' rows='2' wrap='hard'>$value_sur</textarea>" . '<br>' . '<br>';
                        }
                    }

                    foreach ($_SESSION['id'] as $key_id => $value_id) {
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

        foreach ($_SESSION['record'] as $key => $value) {
            if ($value['name'] == $_POST['select'][0]) {
                $author = new Author;
                $author->delete($value['id']);
            }
        }
        echo "

        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_author.php'>
        </head>";
        die;
    } elseif (isset($_POST['add'])) {
        $author = new Author;
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $author->name = "$name";
        $author->surname = "$surname";
        $author->insert();

        echo "
        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_author.php'>
        </head>";
        die;
    };
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Возврат</a>';

    ?>
</body>

</html>
