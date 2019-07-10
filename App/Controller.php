<?php

namespace App;

use App\View\View;

abstract class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    abstract public function __invoke(); //см. комментарии в Onenote
}
