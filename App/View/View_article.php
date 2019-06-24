<?php

namespace App\View;

class View_article implements \Countable  //?  implements \Countable - дает то, что метод count() верно подсчитывает число элементов объекта
{
    protected $data = [];

    /* public function assign($name, $value)
    {
        $this->data[$name] = $value;
    } */

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function display($template)
    {
        include $template;
    }

    public function count()
    {
        return count($this->data);
    }
}
