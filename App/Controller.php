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

    //abstract public function __invoke(); //см. комментарии в Onenote

    //abstract protected function access(): bool;
    abstract protected function access();

    abstract protected function handle();
    public function __invoke()
    {
        if ($this->access()) {
            $this->handle();
        } else {
            die('Введите корректный пароль!');
        }
    } //см. комментарии в Onenote        
}
