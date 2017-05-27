<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 9:21 PM
 */


class AbstractController {

    public function __construct() {
        return $this;
    }


    static function generateViewParams() {
        $categories = '';
        $c_entity = new Category();
        $parentCategories = $c_entity->getObjects('*', array('parent' => 'NULL'));

        foreach($parentCategories as $item) {
            $categories .= '<option value="'.$item['id'].'">'. $item['title'] .'</option>';
            foreach($c_entity->getObjects('*', array('parent' => $item['id'])) as $c_category) {
                $categories .= '<option value="'.$c_category['id'].'">--'. $c_category['title'] .'</option>';
            }
        }

        return array(
            'vacancy_categories' => $categories
        );
    }
}