<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:34 PM
 */
include('parameters.php');

require_once(PROJECT_PATH.'/vendor/autoload.php');
require_once(PROJECT_PATH.'/libs/CRUD.php');
require_once(PROJECT_PATH.'/libs/FileLoader.php');
FileLoader::loadClasses(array('libs', 'models'));


$routing = new Routing();

$routing->processRoute();
