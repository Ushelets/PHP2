<?php

namespace App;

class Db
{
    protected $dbh;

    public function __construct()
    //public function pdo()
    {
        $config = (include dirname(__DIR__, 1) . '/configs/config.php')['db'];
        //  \PDO - означает, что PDO ищется в корневом пространстве имен
        $this->dbh = new \PDO(
            'mysql:host=' . $config['host'] . '; dbname=' . $config['dbname'],
            $config['user'],
            $config['password']
        );
    }

    public function query($sql, $class) // $class будет App\Models\Article и App\Models\User

    {
        //$sth = $this->dbh->prepare($sql);
        //$sth->execute($data);   //занесение данных запроса в пустой массив $data , вот для чего "$data = []"   

        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        return  $this->dbh->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);
        //return  $this->dbh->bindValue(':table', static::TABLE, PDO::PARAM_STR)->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);

        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class); // создается массив объектов, где каждый объект - 1 запись из базы        

    }

    public function execute($sql, $class) // $class будет App\Models\Article и App\Models\User

    {
        return  $this->dbh->query($sql, \PDO::FETCH_CLASS, $class);
    }

    /* public function insAll($query)
    {        
        //return ($this->dbh->prepare($query))->execute();
        return $this->dbh->query($query);        
    } */
}
