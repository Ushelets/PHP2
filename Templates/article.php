<?php


use App\Models\Article;

$data = Article::FindAll();

if ($data) {
    krsort($data);
    $data_slice = array_slice($data, 0, 3);

    foreach ($data_slice as $key => $val) {
        $title = $val->title;
        $text = $val->content;
        $text_arr[] = $text;
        echo "<a href='../Templates/article_one.php?var= $key'>" . $title . '</a>';
        echo '<article style = "border: 1px dotted darkgrey; margin-bottom: 5px;">' . mb_substr($text, 0, 70) . '...' . '</article>' . '<br>';
    }
};
$_SESSION['text'] = $text_arr;

/* echo
    '<form action="../App/AddFunc.php" method="post" enctype="multipart/form-data">
    <b>
        <p>Новость</p>
    </b>
    <textarea name="h_article" placeholder="заголовок новости" cols="120" wrap="hard" id=""></textarea>
    <br><br>
    <textarea name="article" placeholder="новость" cols="120" rows="3" wrap="hard" id=""></textarea>
    <br>
    <button type="submit">Сохранить</button>
</form>';
 */
