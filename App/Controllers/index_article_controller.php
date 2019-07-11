<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class index_article_controller extends Controller
{
    /* public function __invoke()
    {
        $data = Article::FindAll();

        $this->view->articles = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/article.php');
    } */

    protected function access(): bool //? переопределение метода из общего контроллера Controller.php
    {
        return isset($_GET['name']) && 'Вася' == $_GET['name'];
    }
    protected function handle()
    {
        $data = Article::FindAll();

        $this->view->articles = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/article.php');
    }
}
