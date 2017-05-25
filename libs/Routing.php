<?php

/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:36 PM
 */
class Routing
{
    /**
     * Current Instance
     * @var Routing
     */
    private static $instance;
    /**
     * Current controller name
     * @var string
     */
    public $controller;
    /**
     * Current action name
     * @var string
     */
    public $action;
    /**
     * Base project url
     * @var string
     */
    private $base_url;

    /**
     * Closed Construct function
     */
    public function __construct()
    {
        session_start();
        ini_set('zend.enable_gc', true);
        $this->base_url = isset($_SERVER['HTTPS']) ? 'https' : 'http' . "://" . $_SERVER['HTTP_HOST'] . '/';
        $tmp = explode('/', $_SERVER['REQUEST_URI']);
        $this->base_url .= $tmp[1];
    }

    /**
     * Closed clone function
     */
    protected function __clone()
    {
    }

    /**
     * Create Routing class instance
     * @return Routing
     */
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Routing();
        }
        return self::$instance;
    }

//    localhost/{controller name}/{action}
    public function processRoute()
    {
        $request_uri = preg_split('/\\//', $_SERVER['REQUEST_URI']);
        $this->controller = !empty($request_uri[1]) ? $request_uri[1] : 'index';
        $this->action     = !empty($request_uri[2]) ? $request_uri[2] : 'index_action';

        if (!file_exists(CONTROLLERS_PATH . $this->controller . '.php')) {
            return ErrorHandler::ConvertError(101);
        }
        require_once CONTROLLERS_PATH . $this->controller . '.php';

        if (!class_exists($this->controller)) {
            return ErrorHandler::ConvertError(102);
        }
        $controllerClass = new $this->controller();

        if (!method_exists($controllerClass, $this->action)) {
            return ErrorHandler::ConvertError(102);
        }
        $this->cleanupRequest();

        call_user_func(array($this->controller, $this->action), $_REQUEST);
    }

    /**
     * Return current project url
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->base_url;
    }

    public function isMethod($method)
    {
        if ($_SERVER['REQUEST_METHOD'] == $method) {
            return true;
        }
        return false;
    }

    public function cleanupRequest()
    {
        foreach ($_REQUEST as $key => $value) {
            $value = addslashes(trim($value));
            $value = htmlentities($value, ENT_QUOTES);
            unset($_REQUEST['controller'], $_REQUEST['action']);
            $_REQUEST[$key] = $value;
        }
    }
}