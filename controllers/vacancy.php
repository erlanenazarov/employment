<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 7:13 PM
 */

class vacancy extends AbstractController {

    public function search() {
        header ('Content-type: text/html; charset=utf-8');
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $price = isset($_GET['price']) ? $_GET['price'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        $query = 'SELECT * FROM vacancy';
        if($title != '') {
            $tmp_title = explode(' ', $title);
            $new_title = '';
            if(sizeof($tmp_title) > 0) {
                foreach($tmp_title as $item) {
                    $new_title .= '%'.mb_strtolower($item, 'utf8').'%';
                }
            } else {
                $new_title = '%'.mb_strtolower($title, 'utf8').'%';
            }
            $query .= ' WHERE LOWER(title) LIKE \''.$new_title.'\'';
        }

        if($price != '') {
            if($title != '')
                $query .= ' and';
            else
                $query .= ' WHERE';
            $query .= ' price >= '.$price;
        }

        if($category != '') {
            if($price != '' || $title != '')
                $query .= ' and';
            elseif($title == '' && $price == '')
                $query .= ' WHERE';

            $query .= ' category = '.$category;
        }

        $query .= " ORDER BY id DESC";
		
        $entity = new Jobs();
        $jobs = $entity->nakedQuery($query);
        for($i=0; $i < sizeof($jobs); ++$i) {
            $c_entity = new Category();
            $c_title = $c_entity->getObjects('title', array('id' => $jobs[$i]['category']))[0];
            $jobs[$i]['category'] = $c_title['title'];
        }

        $data = array(
            'jobs' => $jobs,
        );
        View::render('search.html', array_merge($data, self::generateViewParams()));
    }

    public function single() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null) {
            return ErrorHandler::ConvertError(404);
        }
        $entity = new Jobs();
        $u_entity = new Users();
        $job = $entity->getObjects('*', array('id' => $id))[0];
        $userData = $u_entity->getObjects('*', array('id' => $job['user_id']))[0];
        $data = array(
            'job' => $job,
            'employer' => $userData
        );
        View::render('vacancy.single.html', array_merge($data, self::generateViewParams()));
    }

    public function create() {
        if(Routing::getInstance()->isMethod('POST')) {
            if(Security::getInstance()->isAuth()) {
                if(Security::getInstance()->getUser()['role'] == 'employer') {
                    $title = $_REQUEST['title'];
                    $work_time = $_REQUEST['work_time'];
                    $price = $_REQUEST['price'];
                    $category = $_REQUEST['category'];
                    $description = $_REQUEST['description'];
                    $work_place_count = $_REQUEST['work_place_count'];
                    $requirements = $_REQUEST['requirements'];
                    $created_at = date('Y-m-d');
                    $user_id = Security::getInstance()->getUser()['id'];

                    $entity = new Jobs();
                    $result = $entity->insertObjects(
                        'title, price, description, requirements, work_place_count, category, work_time, user_id, created_at',
                        "'$title', '$price', '$description', '$requirements', '$work_place_count', '$category', '$work_time', '$user_id', '$created_at'");
                    if($result) {
                        header('Content-Type: application/json');
                        echo json_encode(array(
                            'success' => true,
                            'message' => 'Вы успешно создали вакансию!',
                            'url' => '/vacancy/single/?id='.mysqli_insert_id($entity->database->connect())
                        ));
                        return;
                    } else {
                        header('Content-Type: application/json');
                        echo json_encode(array('success' => false, 'message' => 'Произошла ошибка при попытке создания вакансии!'));
                        return;
                    }
                }
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Вы не работодатель!'));
                return;
            }
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Вы не авторизованы'));
            return;
        }
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Отправлен GET запрос'));
    }


    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : '';

        if($id == '') {
            return ErrorHandler::ConvertError(404);
        }

        $v_entity = new Jobs();
        $u_entity = new Users();
        $job = $v_entity->getObjects('*', array('id' => $id))[0];
        $userData = $u_entity->getObjects('*', array('id' => $job['user_id']))[0];
        $data = array(
            'job' => $job,
            'employer' => $userData
        );
        if(!Security::getInstance()->isAuth() || !Security::getInstance()->getUser()['id'] == $job['user_id']) {
            return ErrorHandler::ConvertError(401);
        }

        if(Routing::getInstance()->isMethod('POST')) {
            $title = $_REQUEST['title'];
            $price = $_REQUEST['price'];
            $work_time = $_REQUEST['work_time'];
            $description = $_REQUEST['description'];
            $requirements = $_REQUEST['requirements'];
            $work_place_count = $_REQUEST['work_place_count'];
            $updated_at = date('Y-m-d');

            $v_entity->updateObject(array(
                'title' => $title,
                'price' => $price,
                'work_time' => $work_time,
                'description' => $description,
                'created_at' => $updated_at,
                'requirements' => $requirements,
                'work_place_count' => $work_place_count
            ), array(
                'id' => $job['id']
            ));
            if($v_entity) {
                $data['message'] = 'Информация успешно обновлена!';
            }
        }

        View::render('vacancy.edit.html', $data);
    }
}