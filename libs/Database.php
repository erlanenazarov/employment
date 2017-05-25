<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:11 PM
 */

class Database {


    public function __construct() {
        return $this;
    }

    /**
     * @var Database Connection
     */
    private $connection = null;


    public function connect() {
        if($this->connection == null) {
            $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            mysqli_set_charset($this->connection, 'UTF8');
        }
        return $this->connection;
    }
}