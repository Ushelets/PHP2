<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Author;


class index_author_controller extends Controller
//class index_author_controller
{
    public function __invoke()
    {
        $data = Author::FindAll();

        foreach ($data as $value) {
            $authors[] = ['name' => $value->name, 'surname' => $value->surname, 'id' => $value->id];
        }
        $_SESSION['authors'] = $authors;

        $this->view->authors = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/author.php');
    }
}
