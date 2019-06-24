<?php
/* $_SESSION = [];

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy(); */

echo "<a href='../Templates/index_article.php'>Новости</a>  ";
//echo "<a href='../Templates/article.php'>Новости</a>  ";
echo "&nbsp&nbsp<a href='../Templates/user.php'>Пользователи</a>";
