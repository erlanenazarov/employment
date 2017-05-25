<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:37 PM
 */

class ErrorHandler {
    public static function ConvertError($error_code) {
        $error_description = "";
        echo($error_code);
        return json_encode(array('error_code' => $error_code, 'description' => $error_description));
    }
}