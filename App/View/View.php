<?php

namespace App\View;

class View implements \Countable  //?  implements \Countable - дает то, что метод count() верно подсчитывает число элементов объекта
{
    protected $data = [];

    /* public function assign($name, $value)
    {
        $this->data[$name] = $value;
    } */

    public function __get($name)
    {
        return $this->data[$name];
        //var_dump($this);
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
        require $template;
    }

    public function count()
    {
        return count($this->data);
    }
}
