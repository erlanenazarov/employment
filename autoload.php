<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:34 PM
 */

error_reporting('E_ALL & ~N_ALL');
define('PROJECT_PATH', __DIR__);
define('CONTROLLERS_PATH', PROJECT_PATH.'/controllers/');
define('TEMPLATES_FOLDER', PROJECT_PATH.'/templates/app/'); 

include('parameters.php');

require_once(PROJECT_PATH.'/vendor/autoload.php');
require_once(PROJECT_PATH.'/libs/CRUD.php');
require_once(PROJECT_PATH.'/libs/FileLoader.php');
FileLoader::loadClasses(array('libs', 'models'));


$routing = new Routing();

$routing->processRoute();
