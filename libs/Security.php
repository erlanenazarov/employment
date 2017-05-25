<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:06 PM
 */

class Security {
    private $loginSession = 'user';


    function createSession($value) {
        $_SESSION[$this->loginSession] = $value;
        return true;
    }

    function validateUser($login, $password) {
        $password = md5($password);
        $user = new Users();
        $data = $user->getObjects('*', array(
            'login' => $login
        ));
        if($data != null) {
            if($data['password'] == $password) {
                $this->authenticateUser($data);
                return (object)array('result' => 'ok', 'message' => 'Авторизация прошла успешно, сессия создана');
            } else {
                return (object)array('result' => 'fail', 'reason' => 'Неверный пароль');
            }
        }
        return (object)array('result' => 'fail', 'reason' => 'Пользователя с таким логином нет в базе');
    }

    private function authenticateUser($user) {
        $this->createSession($user['id']);
    }

    public function checkAuthentication() {
        return isset($_SESSION[$this->loginSession]);
    }
}