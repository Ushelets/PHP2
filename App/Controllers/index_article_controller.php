<?php

namespace App\Controllers;

use App\Controller;
//use App\Models\Article;

//use App\View\View;
//require dirname(__DIR__, 2) . '/autoload.php';

class index_article_controller extends Controller
{
    public function Action()
    {
        //$view = new View();

        $data = Article::FindAll();

        $this->view->articles = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 1) . '/Templates/article.php');
    }
}
