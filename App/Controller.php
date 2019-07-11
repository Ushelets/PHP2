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

    protected function access(): bool
    {
        return true;
        //return false;
    }

    //abstract public function __invoke(); //см. комментарии в Onenote
    public function __invoke()
    {
        if ($this->access()) {
            $this->handle();
        } else {
            die('Нет доступа');
        }
    } //см. комментарии в Onenote

    abstract protected function handle();
}
