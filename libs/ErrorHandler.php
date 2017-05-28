<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:37 PM
 */

class ErrorHandler {
    public static function ConvertError($error_code) {
        $data = array(
            'error_code' => $error_code
        );
        View::render('404', array($data, AbstractController::generateViewParams()));
        return 1;
    }
}