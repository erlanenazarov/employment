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
        $searchCategory = isset($_GET['category']) ? $_GET['category'] : '';
        $categories = '';
        $c_entity = new Category();
        $parentCategories = $c_entity->getObjects('*', array('parent' => 'NULL'));

        foreach($parentCategories as $item) {
            if($searchCategory != '' && $searchCategory == $item['id'])
                $categories .= '<option value="'.$item['id'].'" selected>'. $item['title'] .'</option>';
            else
                $categories .= '<option value="'.$item['id'].'">'. $item['title'] .'</option>';
            foreach($c_entity->getObjects('*', array('parent' => $item['id'])) as $c_category) {
                if($searchCategory != '' && $searchCategory == $c_category['id'])
                    $categories .= '<option value="'.$c_category['id'].'" selected>--'. $c_category['title'] .'</option>';
                else
                    $categories .= '<option value="'.$c_category['id'].'">--'. $c_category['title'] .'</option>';
            }
        }

        return array(
            'vacancy_categories' => $categories
        );
    }
}