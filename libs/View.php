<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:50 PM
 */

class View {

    static function render($templateName, $data=null) {
        include TEMPLATES_FOLDER.$templateName.'.php';
    }
}