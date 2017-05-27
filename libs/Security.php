<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:06 PM
 */

class Security {
    private $loginSession = 'user';

    static private $instance = null;

    static function getInstance() {
        if(self::$instance == null) {
            self::$instance = new Security();
        }
        return self::$instance;
    }

    function checkForUserContains() {
        $entity = new Users();
        $id = $this->getUser()['id'];
        $data = $entity->getObjects('*', array('id' => $id));
        if(is_null($data[0])) {
            $this->removeSession();
        } else {
            $this->createSession($data[0]);
        }
        return !is_null($data[0]);
    }

    function createSession($value) {
        $_SESSION[$this->loginSession] = $value;
        return true;
    }

    function removeSession() {
        unset($_SESSION[$this->loginSession]);
        return true;
    }

    function validateUser($login, $password) {
        $password = md5($password);
        $user = new Users();
        $data = $user->getObjects('*', array(
            'login' => $login
        ));
        if($data[0] != null) {
            if($data[0]['password'] == $password) {
                $this->authenticateUser($data[0]);
                return array('result' => true, 'message' => 'Авторизация прошла успешно, сессия создана');
            } else {
                return array('result' => false, 'reason' => 'Неверный пароль');
            }
        }
        return array('result' => 'fail', false => 'Пользователя с таким логином нет в базе');
    }

    private function authenticateUser($user) {
        $this->createSession($user);
    }

    public function isAuth() {
        return isset($_SESSION[$this->loginSession]);
    }

    public function getUser() {
        return $_SESSION[$this->loginSession];
    }
}