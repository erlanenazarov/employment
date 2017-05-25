<?php

/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:06 PM
 */
class authentication
{


    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];

            $security = new Security();

            $signIn = $security->validateUser($login, $password);
            if (!$signIn->{'result'}) {
                header('Location: /index/index_action/?func=login&result=' . $signIn->{'result'} . '&reason=' . $signIn->{'reason'});
            }
            header('Location: /index/index_action/?func=login&result=' . $signIn->{'result'} . '&reason=' . $signIn->{'reason'});
        }
        echo($_SERVER['REQUEST_METHOD']);
    }

    public function register()
    {
        $data = array();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];

            $usersEntity = new Users();
            $userData = $usersEntity->getObjects('*', array('login' => $login));
            if (sizeof($userData) < 1) {
                $encrypted_password = md5($password);
                $result = $usersEntity->insertObjects('login, password', '\'' . $login . '\', \'' . $encrypted_password . '\'');
                if ($result) {
                    $security = new Security();
                    $security->validateUser($login, $password);
                    header('location: /');
                } else {
                    $data['error'] = 'Произошла неизвестная ошибка';
                }
            } else {
                $data['error'] = 'Пользователь с таким логином уже есть';
            }
        }
        View::render('registerPage', $data);
    }
}