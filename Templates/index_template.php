<?php
require dirname(__DIR__, 1) . '/App/autoload.php';

/* echo '$_GET <pre>';
var_dump($_GET);
echo '</pre>';
echo '$_POST <pre>';
var_dump($_POST);
echo '</pre>';
echo '$_SESSION <pre>';
var_dump($_SESSION);
echo '</pre>'; */


if ($_GET['var'] == 'news') {
    $cntrlr = 'index_article_controller';
} elseif ($_GET['var'] == 'admins' || isset($_POST['password_admin'])  || $_SESSION['new_admin'] == 1) {
    if (isset($_POST['password_admin'])) {
        $_SESSION['repeat'] = 1;
        $_SESSION['psw_adm'] = $_POST['password_repeat'];
    } else {
        $_SESSION['repeat'] = 0;
    }
    $_SESSION['new_admin'] = 0;
    $cntrlr = 'index_admin_controller';
} elseif ($_GET['var'] == 'authors' || isset($_POST['password_auth']) || $_SESSION['new_auth'] == 1) {
    if (isset($_POST['password_auth'])) {
        $_SESSION['repeat'] = 1;
        $_SESSION['psw_auth'] = $_POST['password_repeat'];
    } else {
        $_SESSION['repeat'] = 0;
    }
    $_SESSION['new_auth'] = 0;
    $cntrlr = 'index_author_controller';
} elseif ($_GET['var'] == 'users' || isset($_POST['password_usr']) || $_SESSION['new_usr'] == 1) {
    if (isset($_POST['password_usr'])) {
        $_SESSION['repeat'] = 1;
        $_SESSION['psw_usr'] = $_POST['password_repeat'];
    } else {
        $_SESSION['repeat'] = 0;
    }
    $_SESSION['new_usr'] = 0;
    $cntrlr = 'index_user_controller';
}

$class = "\App\Controllers\\$cntrlr";

$cntrlr = new $class();
$cntrlr();
