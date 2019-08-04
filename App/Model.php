<?php

namespace App;

//require 'Config.php';

abstract class Model extends Db
{
    public $id;

    public const TABLE = '';

    //abstract public function GetModelName(); //абстрактный метод - без тела, т.е. без реализации

    /**
     * FindAll
     *
     * @return void
     */
    public static function FindAll()
    {
        $db = new Db();
        //$db = Db::getInstance();
        //Db::getInstance();
        //$class = get_called_class(); //возвращает название класса, из котрого производится вызов
        $class = static::class;
        $data = ['table' => static::TABLE];
        //$sql = 'SELECT * FROM ' . $class::TABLE; //после FROM - важен пробел

        $sql = 'SELECT * FROM ' . $data['table']; //static - поздняя компиляция, т.е. подстановка после компиляции        

        return $db->query($sql, $class);
    }

    /**
     * FindById
     *
     * @param  mixed $id
     *
     * @return void
     */
    public static function FindById($id)
    {
        $db = new Db();
        //$db = Db::getInstance();
        $data = ['table' => static::TABLE];

        //$sql = 'SELECT * FROM ' . $data['table'] . " WHERE id = $id";
        $sql = 'SELECT * FROM ' . $data['table'] . " WHERE id = :id";

        $class = static::class;

        return $db->query($sql, [':id' => $id], $class);
        //return $db->query($sql, $class);
    }

    /**
     * Upd
     *
     * @param  mixed $set
     * @param  mixed $where
     *
     * @return void
     */
    public static function Upd($set, $where)
    {
        $db = new Db();
        //$db = Db::getInstance();

        $data = ['table' => static::TABLE]; //static - поздняя компиляция, т.е. подстановка после компиляции

        $sql = 'UPDATE ' . $data['table'] . " SET $set WHERE $where"; //static - поздняя компиляция, т.е. подстановка после компиляции

        $class = static::class;

        return $db->execute($sql, $class);
        //return Db::execute($sql, $class);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert() //метод динамический - для 1 записи
    {
        $db = new Db();
        //$db = Db::getInstance();

        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name  || 'dbh' == $name) {
                continue; // continue - означает что пропускается поле
            }

            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . '(' . implode(',', $cols) . ') VALUES(' . implode(',', array_keys($data)) . ')';

        $db->execute1($sql, $data); //- это динамический запрос, т.е. для 1 записи
        //Db::execute1($sql, $data); - это статический запрос, т.е. для всех сразу записей

        $this->$id = $db->GetLastId();
    }
    /**
     * update
     *
     * @param  mixed $id_chng
     *
     * @return void
     */
    public function update($id_chng) //метод динамический - для 1 записи
    {
        $db = new Db();
        //$db = Db::getInstance();

        $fields = get_object_vars($this);
        //$fields = Db::get_object_vars($this);        

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' == $name || 'dbh' == $name) {
                continue; // continue - означает что пропускается поле
            }
            $cols[] = $name;
            //$data[':' . $name] = $value;
            $data[] = $value;
        }

        foreach ($cols as $key_cols => $val_cols) {
            foreach ($data as $key_data => $val_data) {
                if ($key_cols == $key_data) {
                    $sql = 'UPDATE ' . static::TABLE . " SET $val_cols='$val_data' WHERE id=$id_chng";
                    $sql_arr[] = $sql;
                }
            }
        }

        $class = static::class;

        $sql_arr_uniq = array_unique($sql_arr);

        foreach ($sql_arr_uniq as $val_arr_uniq) {
            $db->execute($val_arr_uniq, $class);
            //Db::execute($val_arr_uniq, $class);
        }

        $this->$id = $db->GetLastId();
        //$this->$id = Db::GetLastId();
    }

    /**
     * delete
     *
     * @param  mixed $id_del
     *
     * @return void
     */
    public function delete($id_del) //метод динамический - для 1 записи
    {
        $db = new Db();
        //$db = Db::getInstance();

        $class = static::class;

        $sql = 'DELETE FROM ' . static::TABLE . " WHERE id =  $id_del";

        $db->execute($sql, $class);
        //Db::execute($sql, $class);

        $this->$id = $db->GetLastId();
        //$this->$id = Db::GetLastId();
    }
}
