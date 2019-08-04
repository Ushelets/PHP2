<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

use \App\Models\Article; ?>

<!doctype html>
<html lang="en">

<head>
    <title>Новость</title>
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
</body>
<?php

if (isset($_POST['save_chng'])) {
    $article = new Article;
    $title = $_POST['title_article'];
    $text = $_POST['text_article'];
    $article->title = "$title";
    $article->content = "$text";
    $article->update($_SESSION['id_chng']);
    echo "

        <head>
            <meta http-equiv='Refresh' content='0; URL=http://PHP2/Templates/index_template.php'>
        </head>";
    die;
} else {
    foreach ($_SESSION['id'] as $key => $value) {
        if ($value == $_GET['var']) {
            foreach ($_SESSION['text'] as $key_txt => $value) {
                if ($key_txt == $key) {
                    echo $value . '<br>' . '<br>';
                }
            }
        }
    }
}


echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">Возврат</a>'; ?>

</html>
