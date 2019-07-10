<?php

namespace App\Controllers;

use App\Models\Author;
//use App\View\View;

require dirname(__DIR__, 2) . '/autoload.php';

class index_author_controller extends Controller
{
    public function Action()
    {
        //$view = new View();

        $data = Author::FindAll();

        foreach ($data as $value) {
            $authors[] = ['name' => $value->name, 'surname' => $value->surname, 'id' => $value->id];
        }
        $_SESSION['authors'] = $authors;

        $this->view->authors = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/author.php');
    }
}
