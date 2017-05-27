<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:19 PM
 */

class EntityManager extends CRUD {

    public $table = '';
    private $database = null;


    public function __construct() {
        if($this->database == null) {
            $this->database = new Database();
        }
    }

    function getObjects($fields, $where = array())
    {
        $query = 'SELECT '.$fields.' FROM '.$this->table;
        if(sizeof($where) > 0) {
            $where = $this->prepareWhere($where);
            if($where != null) {
                $query .= ' WHERE '.$where;
            }
        }
        $result = mysqli_query($this->database->connect(), $query);

        $n = mysqli_num_rows($result);
        if($n > 1) {
            $data = array();
            for($i=0; $i < $n; ++$i) {
                $row = mysqli_fetch_assoc($result);
                $data[$i] = $row;
            }
            return $data;
        }

        return array(mysqli_fetch_assoc($result));
    }

    function insertObjects($fields, $values)
    {
        $query = 'INSERT INTO '.$this->table.' ('.$fields.') VALUES('.$values.')';
        $result = mysqli_query($this->database->connect(), $query);
        return $result;
    }

    function updateObject($fields = array(), $where = array())
    {
        $fields = $this->prepareWhere($fields);
        $where = $this->prepareWhere($where);
        $query = 'UPDATE '.$this->table.' SET '.$fields.' WHERE '.$where;
        $result = mysqli_query($this->database->connect(), $query);
        return $result;
    }

    function deleteObjects($fields = array())
    {
        $fields = $this->prepareWhere($fields);
        $query = 'DELETE FROM '.$this->table.' WHERE '.$fields;
        $result = mysqli_query($this->database->connect(), $query);
        return $result;
    }

    function prepareWhere($fields = array()) {
        if(!is_array($fields) || sizeof($fields) == 0) {
            return null;
        }

        $result = '';
        $index = 0;
        foreach($fields as $key=>$value) {
            if(is_numeric($value))
                $result .= $key . '=' . $value;
            else
                $result .= $key . '=\'' . $value . '\'';
            $index++;
            if($index < sizeof($fields)) $result .= ', ';
        }
        return $result;
    }

    function orderBy($fields = array()) {
        if(!is_array($fields) || sizeof($fields) == 0) {
            return null;
        }
    }

    function findBy($fields = array()) {
        if(!is_array($fields)) {
            $fields = array($fields);
        }

        $result = '';
        foreach($fields as $key=>$value) {
            $result .= $key . ' LIKE \'%' . $value .'%\' ';
        }
        $query = 'SELECT * FROM ' . $this->table . ' WHERE ' . $result;
        $result = mysqli_query($this->database->connect(), $query);
        $n = mysqli_num_rows($result);
        if($n > 1) {
            $data = array();
            for($i=0; $i < $n; ++$i) {
                $row = mysqli_fetch_assoc($result);
                $data[$i] = $row;
            }
            return $data;
        }

        return array(mysqli_fetch_assoc($result));
    }
}