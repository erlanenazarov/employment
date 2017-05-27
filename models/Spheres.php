<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 3:50 PM
 */

class Spheres extends EntityManager {

    public function __construct() {
        parent::__construct();
        $this->table = 'sphere';
    }
}