<?php

namespace App;

class DbException extends \Exception
{
    protected $sql;

    public function __construct($sql, $message = "", $code = 0,  Throwable $previous = NULL)
    {
        $this->sql = $sql;
        parent::__construct($message, $code, $previous);
    }

    public function GetSql()
    {
        return $this->sql;
    }
}
