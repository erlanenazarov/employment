<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/28/17
 * Time: 2:04 PM
 */

class Feedback extends EntityManager {

    public function __construct() {
        parent::__construct();
        $this->table = 'feedback';
    }
}