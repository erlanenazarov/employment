<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 4:06 PM
 */


class authentication {


    public function login()
    {
        if (Routing::getInstance()->isMethod('POST')) {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];
            $security = new Security();

            $signIn = $security->validateUser($login, $password);
            header('Content-Type: application/json');
            echo json_encode($signIn);
            return;
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }

    public function logout() {
        Security::getInstance()->removeSession();
        $next = isset($_GET['next']) ? $_GET['next'] : null;
        if($next != null) {
            header('Location: '.$next);
        }
        header('Location: /');
    }

    public function register()
    {
        if (Routing::getInstance()->isMethod('POST')) {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password1'];
            $passwordConfirm = $_REQUEST['password2'];
            $role = $_REQUEST['role'];

            $usersEntity = new Users();
            $userData = $usersEntity->getObjects('*', array('login' => $login));
            if(sizeof($userData) < 2 && $userData[0] != null) {
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Такой пользователь уже существует!'));
                return;
            }
            if($password == $passwordConfirm) {
                $hashed_password = md5($password);
                $result = $usersEntity->insertObjects('login, password, role', '\''.$login.'\', \''.$hashed_password.'\', \''.$role.'\'');
                if($result) {
                    $security = new Security();
                    $security->validateUser($login, $password);
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => true, 'message' => 'Пользователь зарегистрирован', 'role' => $role));
                    return;
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => false, 'message' => 'Произошла ошибка при регистрации'));
                    return;
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Пароли не совпадают!'));
                return;
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }

    public function register_employer() {
        if(Routing::getInstance()->isMethod('POST')) {
            if(Security::getInstance()->isAuth()) {
                if(Security::getInstance()->getUser()['role'] == 'employer') {
                    $organization = $_REQUEST['organization'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $email = $_REQUEST['email'];
                    $user_id = Security::getInstance()->getUser()['id'];

                    $usersEntity = new Users();
                    $result = $usersEntity->updateObject(array(
                        'organization' => $organization,
                        'address' => $address,
                        'phone_number' => $phone,
                        'email' => $email
                    ), array(
                        'id' => $user_id
                    ));
                    if($result) {
                        header('Content-Type: application/json');
                        echo json_encode(array('success' => true, 'message' => 'Работодатель зарегистрирован'));
                        return;
                    } else {
                        header('Content-Type: application/json');
                        echo json_encode(array('success' => false, 'message' => 'Произошла неизвестная ошибка'));
                        return;
                    }
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => false, 'message' => 'Этот пользователь уже зарегистрирован как сосискатель'));
                    return;
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Пользователь не авторизован'));
                return;
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }

    public function register_employee() {
        if(Routing::getInstance()->isMethod('POST')) {
            $name = $_REQUEST['name'];
            $birthday = $_REQUEST['birthday'];
            $phone = $_REQUEST['phone'];
            $education = $_REQUEST['education'];
            $experience = $_REQUEST['experience'];
            $speciality = $_REQUEST['speciality'];
            $sphere = $_REQUEST['sphere'];

            if(Security::getInstance()->isAuth()) {
                if(Security::getInstance()->getUser()['role'] == 'employee') {
                    $entity = new Users();
                    $result = $entity->updateObject(array(
                        'name' => $name,
                        'birthday' => $birthday,
                        'phone_number' => $phone,
                        'education' => $education,
                        'experience' => $experience,
                        'speciality' => $speciality,
                        'sphere' => $sphere
                    ), array(
                        'id' => Security::getInstance()->getUser()['id']
                    ));
                    if($result) {
                        header('Content-Type: application/json');
                        echo json_encode(array('success' => true, 'message' => 'Сосикатель зарегистрирован'));
                        return;
                    } else {
                        header('Content-Type: application/json');
                        echo json_encode(array('success' => false, 'message' => 'Произошла ошибка при регистрации сосикателя'));
                        return;
                    }
                } else {
                    header('Content-Type: application/json');
                    echo json_encode(array('success' => false, 'message' => 'Вы уже зарегистрированы как работодатель'));
                    return;
                }
            } else {
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Вы не авторизованы'));
                return;
            }

        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }
}