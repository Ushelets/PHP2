<?php
namespace App;

/* class Config
{
    protected static $_instance;

    private function __construct()
    {
        $data = [
            'db' => [
                'host' => 'localhost',
                'dbname' => 'php2',
                'user' => 'root',
                'password' => ''
            ]
        ];

        $this->_instance = new  \PDO(
            'mysql:host='  . $data['db']['host'] .  '; dbname=' . $data['db']['dbname'],
            $data['db']['user'],
            $data['db']['password']
        );
    }

    public static function getInstance()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    private function __clone()
    { }

    private function __wakeup()
    { }
} */

class Config
{
    public function __construct()
    {
        $data = [
            'db' => [
                'host' => 'localhost',
                'dbname' => 'php2',
                'user' => 'root',
                'password' => ''
            ]
        ];

        $this->dbh = new  \PDO(
            'mysql:host='  . $data['db']['host'] .  '; dbname=' . $data['db']['dbname'],
            $data['db']['user'],
            $data['db']['password']
        );
    }
}
