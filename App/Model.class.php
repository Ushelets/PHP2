<?php

namespace App;

//use App\Models;

abstract class Model
{
    public $id;

    public const TABLE = '';    

    //abstract public function GetModelName(); //абстрактный метод - без тела, т.е. без реализации
    
    public static function FindAll()
    {
        $db = new Db();
        //$class = get_called_class();
        
        //$sql = 'SELECT * FROM ' . $class::TABLE; //после FROM - важен пробел
        $sql = 'SELECT * FROM ' . static::TABLE; //static - поздняя компиляция, т.е. подстановка после компиляции
        return $db->query(
            $sql,            
            static::class
        );
    }     
    
}
