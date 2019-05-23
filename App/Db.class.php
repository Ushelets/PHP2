<?php

namespace App;

class Db
{
    protected $dbh;    

    public function __construct()
    //public function pdo()
    {
        $config = (include dirname(__DIR__, 1) .'/config.php')['db'];        
        //  \PDO - означает, что PDO ищется в корневом пространстве имен
        $this->dbh = new \PDO(
            "mysql:host=$config[host]; dbname=$config[dbname]", 
            "$config[user]", 
            "$config[password]"
        );                  
    }   

    //public function query($sql, $data = [], $class) // $class будет App\Models\Article и App\Models\User
    
    public function query($sql, $class) // $sql будет "SELECT * FROM news" и "SELECT * FROM users"
    { 
        //$sth = $this->dbh->prepare($sql);
        //$sth->execute();   //занесение данных запроса в пустой массив $data , вот для чего "$data = []"   
        //return  $sth->fetchAll(\PDO::FETCH_CLASS, $class);        
        return $this->dbh->query($sql)->fetchAll(\PDO::FETCH_CLASS, $class);                
    }
    
    /* public function insAll($query)
    {        
        //return ($this->dbh->prepare($query))->execute();
        return $this->dbh->query($query);        
    } */

}
