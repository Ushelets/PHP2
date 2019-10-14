<?php

namespace App;

use \App\DbException;

class Db extends Config

{
    public function query($sql, $class) // $class будет App\Models\Article и App\Models\User
    {
        //$sth = $this->dbh->prepare($sql);
        //$sth->execute($data);   //занесение данных запроса в пустой массив $data , вот для чего "$data = []"   

        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        //return  Config()->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);
        $query = $this->dbh->query($sql);
        //return  $this->dbh->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);
        if (!$query) {
            echo '<pre>';
            throw new DbException($sql, 'Запрос не выполнен!!');
            echo '</pre>';
        }
        return  $query->fetchAll(\PDO::FETCH_CLASS, $class);
        //return  $this->dbh->bindValue(':table', static::TABLE, PDO::PARAM_STR)->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);

        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class); // создается массив объектов, где каждый объект - 1 запись из базы        

    }

    public function queryEach($sql, $class) // $class будет App\Models\Article и App\Models\User
    {
        $query = $this->dbh->query($sql);
        if (!$query) {
            echo '<pre>';
            throw new DbException($sql, 'Запрос не выполнен!!');
            echo '</pre>';
        }
        $query_fetch = $query->fetchAll(\PDO::FETCH_CLASS, $class);
        while ($query_fetch) {
            yield $query_fetch;
        }
    }

    public function cntRow($sql, $class) // $class будет App\Models\Article и App\Models\User
    {
        //$query = $this->dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $query = $this->dbh->query($sql);
        $query->setFetchMode(\PDO::FETCH_CLASS, $class);
        if (!$query) {
            echo '<pre>';
            throw new DbException($sql, 'Запрос не выполнен!!');
            echo '</pre>';
        }
        return $query->fetch();
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
