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
}