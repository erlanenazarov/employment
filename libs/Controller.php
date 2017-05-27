<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 1:50 PM
 */

class Controller {


    public function JsonResponse($value) {
        header('Content-Type: application/json');
        echo json_encode($value);
    }
}