<?php

namespace App;

class Errors extends \Exception
{
    protected $errors = [];

    public function Add(\Exception $e)
    {
        $this->errors[] = $e;
    }

    public function All()
    {
        return $this->errors;
    }

    public function Empty()
    {
        return empty($this->errors);
    }
}
