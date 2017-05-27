<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:14 PM
 */

class Users extends EntityManager {

    function __construct() {
        parent::__construct();
        $this->table = 'Users';
    }
}