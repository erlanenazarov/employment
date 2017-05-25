<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:31 PM
 */

class FileLoader {


    public static function loadClasses($folders){
        if(!is_array($folders)){
            $folders = array($folders);
        }
        foreach ($folders as $item):
            if(empty($item)){
                continue;
            }
            if($data = opendir(PROJECT_PATH.'/'.$item)){
                while(false !== ($entry = readdir($data))){
                    if(is_file(PROJECT_PATH.'/'.$item.'/'.$entry)){
                        require_once(PROJECT_PATH.'/'.$item.'/'.$entry);
                    }
                }
            }
        endforeach;
    }
}