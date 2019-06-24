<!doctype html>
<html lang="en">

<head>
    <title>Новости</title>
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
    require dirname(__DIR__, 1) . '/autoload.php';
    use App\Models\Article; ?>
    <form id="artcl_edit" action="/App/article_edit.php" method="post" enctype="multipart/form-data">
        <?php
        //$data = Article::FindAll();


        //krsort($data);
        //$data_slice = array_slice($data, 0, 3);

        //foreach ($this->data['articles'] as $val) {

        /** @var \App\View $this */

        foreach ($this->articles as $val) {
            $id = $val->id;
            $title = $val->title;
            $text = $val->content;
            $id_arr[] = $id;
            $text_arr[] = $text;
            $title_arr[] = $title;
            $record[] = ['id' => $id, 'title' => $title, 'text' => $text];

            echo '
                <label class="btn btn-primary">
                <input type="radio" name="select[]" value="' . $title . '">
            </label>&nbsp';

            echo "<a href='../Templates/article_one.php?var= $id'>" . $title . '</a>';
            echo '<article style = "border: 1px dotted darkgrey; margin-bottom: 5px;">' . mb_substr($text, 0, 70) . '...' . '</article>' . '<br>';
        }
        //};
        $_SESSION['id'] = $id_arr;
        $_SESSION['text'] = $text_arr;
        $_SESSION['title'] = $title_arr;
        $_SESSION['record'] = $record;

        ?>
        <button type="submit" class="btn btn-warning" name="save">Изменить</button>
        <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
    </form>
    <br><br>
    <form action="../App/article_edit.php" method="post" enctype="multipart/form-data">
        <b>
            <p>Добавить новость</p>
        </b>
        <textarea name="h_article" placeholder="заголовок новости" cols="250" rows="3" wrap="hard"></textarea>
        <br><br>
        <textarea name="article" placeholder="новость" cols="250" rows="7" wrap="hard"></textarea>
        <br>
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
    </form>

    <a href="../index.php"> Возврат </a>

</body>

</html>
