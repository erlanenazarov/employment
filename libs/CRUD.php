<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:15 PM
 */

abstract class CRUD {

    abstract function getObjects($fields, $where = array());
    abstract function insertObjects($fields, $values);
    abstract function updateObject($fields = array(), $where = array());
    abstract function deleteObjects($fields = array());
}