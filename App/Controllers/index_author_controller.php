<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Author;

class index_author_controller extends Controller
{
    protected function access()
    {
        if ($_SESSION['repeat'] == 1) {
            $data = Author::FindAll();
            foreach ($data as $value) {
                if (password_verify($_SESSION['psw_auth'], $value->password)) {
                    $_SESSION['id'] = $value->id;
                    $_SESSION['id_news'] = $value->id;
                    return  true;
                }
            }
        } else {
            return true;
        }
    }

    protected function handle()
    {
        $data = Author::FindAll();

        foreach ($data as $value) {
            $authors[] = ['name' => $value->name, 'surname' => $value->surname, 'id' => $value->id];
        }
        $_SESSION['authors'] = $authors;

        $_SESSION['repeat'] = 0;
        $_SESSION['psw_auth'] = 0;

        $this->view->authors = $data; //вместо  $view->assign('articles', $data);

        $this->view->display(dirname(__DIR__, 2) . '/Templates/author.php');
    }
}
