<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 8:59 PM
 */

class Category extends EntityManager {

    public function __construct() {
        parent::__construct();
        $this->table = 'category';
    }
}