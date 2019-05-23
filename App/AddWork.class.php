<?php

 namespace App;

class AddWork
{
    protected $dbh;

    public function __construct()
    {
        $config = (include dirname(__DIR__, 1) . '/config.php')['db'];
        //  \PDO - означает, что PDO ищется в корневом пространстве имен
        $this->dbh = new \PDO(
            "mysql:host=$config[host]; dbname=$config[dbname]",
            "$config[user]",
            "$config[password]"
        );
    }

    public function insAll($query)
    {
        return ($this->dbh->prepare($query))->execute();
        //return $this->dbh->query($query);
    }
}
