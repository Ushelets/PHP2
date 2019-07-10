<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

//use App\View\View;
//require dirname(__DIR__, 2) . '/autoload.php';

class index_article_controller extends Controller
//class index_article_controller
{
    public function Action()
    {
        //$view = new View();

        $data = Article::FindAll();

        $this->view->articles = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/article.php');
    }
}
