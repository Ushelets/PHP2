<?php
session_start();

foreach ($_SESSION['text'] as $key => $value) {
    if ($key == $_GET['var']) {
        echo $value . '<br>' . '<br>';
    }
}

echo '<a href="' . $_SERVER['HTTP_REFERER'] . '" >Возврат</a>';
