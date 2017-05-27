<?php
/**
 * Created by PhpStorm.
 * User: erlan
 * Date: 5/27/17
 * Time: 7:13 PM
 */

class vacancy extends AbstractController {

    public function search() {
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $price = isset($_GET['price']) ? $_GET['price'] : '';
        $category = isset($_GET['category']) ? $_GET['category'] : '';
        //var_dump($title, $price, $category);
        $query = 'SELECT * FROM vacancy';
        if($title != '') {
            $tmp_title = explode(' ', $title);
            $new_title = '';
            if(sizeof($tmp_title) > 0) {
                foreach($tmp_title as $item) {
                    $new_title .= ' %'.strtolower($item).'% ';
                }
            } else {
                $new_title = '%'.$title.'%';
            }
            $query .= ' WHERE title LIKE \''.$new_title.'\'';
        }

        if($price != '') {
            if($title != '')
                $query .= ',';
            else
                $query .= ' WHERE';
            $query .= ' price >= '.$price;
        }

        if($category != '') {
            if($price != '' && $title != '')
                $query .= ',';
            elseif($title == '' && $price == '')
                $query .= ' WHERE';

            $query .= ' category = '.$category;
        }

        $per_page = 20;
        $start = abs($page*$per_page);
        $query .= " LIMIT $start,$per_page";

        $entity = new Jobs();
        $jobs = $entity->nakedQuery($query);
        foreach($jobs as $item) {
            $c_entity = new Category();
            $c_title = $c_entity->getObjects('title', array('id' => $item['category']))[0];
            $item['category'] = $c_title;
        }

        $count = $entity->nakedQuery('SELECT count(*) FROM vacancy')[0]['count(*)'];
        if($count > 0) {
            $num_pages = ceil($count/$per_page);
        } else {
            $num_pages = array();
        }

        $data = array(
            'jobs' => $jobs,
            'num_pages' => $num_pages
        );
        View::render('search.html', array_merge($data, self::generateViewParams()));
    }

    public function single() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null) {
            return ErrorHandler::ConvertError(404);
        }
        $entity = new Jobs();
        $job = $entity->getObjects('*', array('id' => $id))[0];
        $data = array(
            'job' => $job
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
                    $created_at = date('Y-m-d');
                    $user_id = Security::getInstance()->getUser()['id'];

                    $entity = new Jobs();
                    $result = $entity->insertObjects(
                        'title, price, description, category, work_time, user_id, created_at',
                        '\''.$title.'\', \''.$price.'\', \''.$description.'\', \''.$category.'\', \''.$work_time.'\', \''.$user_id.'\', \''.$created_at.'\'');
                    if($result) {
                        header('Content-Type: application/json');
                        echo json_encode(array('success' => true, 'message' => 'Вы успешно создали вакансию!'));
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
}