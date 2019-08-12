<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Article;

class index_article_controller extends Controller
{
    protected function access()
    {
        return true;
    }
    protected function handle()
    {
        $data = Article::FindAll();

        foreach ($data as $value) {
            $articles[] = ['id' => $value->id, 'title' => $value->title, 'content' => $value->content, 'author_id' => $value->author_id];
        }
        $_SESSION['articles'] = $articles;

        $this->view->articles = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/article.php');
    }
}
