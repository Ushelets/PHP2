<?php

namespace App;

//namespace configs;

//require 'Config.php';

//Config::getInstance(); // инициализация экземпляра класса для работы с БД */

//class Db
class Db extends Config

{
    protected $dbh;

    public function query($sql, $class) // $class будет App\Models\Article и App\Models\User
    {
        //$sth = $this->dbh->prepare($sql);
        //$sth->execute($data);   //занесение данных запроса в пустой массив $data , вот для чего "$data = []"   

        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        //return  Config()->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);
        return  $this->dbh->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);
        //return  $this->dbh->bindValue(':table', static::TABLE, PDO::PARAM_STR)->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);

        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class); // создается массив объектов, где каждый объект - 1 запись из базы        

    }

    public function execute($sql, $class) // $class будет App\Models\Article и App\Models\User

    {
        //return  $this->dbh->Config::query($sql, \PDO::FETCH_CLASS, $class);
        return  $this->dbh->query($sql, \PDO::FETCH_CLASS, $class);
    }
    public function execute1($sql, $data = [])
    {
        /* $sth = $this->dbh->Config::prepare($sql);
        return $sth->Config::execute($data);   //занесение данных запроса в пустой массив $data , вот для чего "$data = []" */
        $sth = $this->dbh->prepare($sql);

        return $sth->execute($data);   //занесение данных запроса в пустой массив $data , вот для чего "$data = []"   

    }

    public function GetLastId()
    {
        //return $this->dbh->Config::lastInsertId();
        return $this->dbh->lastInsertId();
    }
}
