<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 8:40 PM
 */

class Jobs extends EntityManager {

    public function __construct() {
        parent::__construct();
        $this->table = 'vacancy';
    }
}