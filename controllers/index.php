<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/25/17
 * Time: 3:45 PM
 */


class index extends AbstractController {


    public function index_action() {
        $specialityEntity = new Specialities();

        $needToFillData = false;

        if(Security::getInstance()->isAuth()) {
            $user = Security::getInstance()->getUser();
            if($user['role'] == 'employer') {
                if(is_null($user['organization'])) $needToFillData = true;
                if(is_null($user['address'])) $needToFillData = true;
                if(is_null($user['email'])) $needToFillData = true;
            } elseif($user['role'] == 'employee') {
                if(is_null($user['name'])) $needToFillData = true;
                if(is_null($user['birthday'])) $needToFillData = true;
                if(is_null($user['phone_number'])) $needToFillData = true;
            }
        }

        $data = array(
            'specialities' => $specialityEntity->getObjects('*'),
            'need_to_fill_data' => $needToFillData
        );

        View::render('index.html', array_merge($data, self::generateViewParams()));
    }

    public function get_sphere_by_speciality() {
        if(Routing::getInstance()->isMethod('POST')) {
            $speciality = $_REQUEST['speciality'];

            $entity = new Spheres();
            $spheres = $entity->getObjects('*', array(
                'speciality' => $speciality
            ));
            $result = '<option value>Выберите из списка</option>';
            foreach($spheres as $item) {
                $result .= '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
            }
            header('Content-Type: application/json');
            echo json_encode(array('items' => $result, 'success' => true));
            return;
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }

    public function feedback() {
        if(Routing::getInstance()->isMethod('POST')) {
            $name = $_REQUEST['name'];
            $email = $_REQUEST['email'];
            $text = $_REQUEST['text'];

            $entity = new Feedback();
            $result = $entity->insertObjects('name, email, text', "'$name', '$email', '$text'");
            if($result) {
                $body = '<b>Имя</b>: '.$name.' <br>';
                $body .= '<b>Почта</b>: '.$email.' <br>';
                $body .= '<b>Текст сообщения</b>: <br>';
                $body .= $text;
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->CharSet = 'UTF-8';
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'okay11007@gmail.com';
                $mail->Password = 'Afrodita97';
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->setFrom('admin@employment_agency;', 'Агенство вокансий 2017');
                $mail->addAddress($email);
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Обратная связь с Employment Agency';
                $mail->Body    = $body;
                $mail->send();
                header('Content-Type: application/json');
                echo json_encode(array('success' => true, 'message' => 'Запрос успешно отправлен'));
                return;
            } else {
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Произошла ошибка при попытке отправки обратной связи, попробуйте позже'));
                return;
            }
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }
}