<?php

namespace App;

abstract class Model
{
    public $id;

    public const TABLE = '';

    abstract public function GetModelName(); //абстрактный метод - без тела, т.е. без реализации

    public static function FindAll()
    {
        $db = new Db();
        //$class = get_called_class(); //возвращает название класса, из котрого производится вызов
        $data = ['table' => static::TABLE];
        //$sql = 'SELECT * FROM ' . $class::TABLE; //после FROM - важен пробел

        $sql = 'SELECT * FROM ' . $data['table']; //static - поздняя компиляция, т.е. подстановка после компиляции

        $class = static::class;

        return $db->query($sql, $class);
    }

    public static function FindById($id)
    {
        $db = new Db();
        $data = ['table' => static::TABLE];

        $sql = 'SELECT * FROM ' . $data['table'] . " WHERE id = $id";

        $class = static::class;

        return $db->query($sql, $class);
    }

    public static function Upd($set, $where)
    {
        $db = new Db();

        $data = ['table' => static::TABLE]; //static - поздняя компиляция, т.е. подстановка после компиляции

        $sql = 'UPDATE ' . $data['table'] . " SET $set WHERE $where"; //static - поздняя компиляция, т.е. подстановка после компиляции

        $class = static::class;

        return $db->execute($sql, $class);
    }

    public static function Ins($email, $name)
    {
        $db = new Db();

        $data = [
            'table' => static::TABLE,
            'email' => $email,
            'name' => $name,
        ]; //static - поздняя компиляция, т.е. подстановка после компиляции

        $sql = 'INSERT INTO ' . $data['table'] . "(`email`, `name`) VALUES ('$email','$name')";

        $class = static::class;

        return $db->execute($sql, $class);
    }
}
