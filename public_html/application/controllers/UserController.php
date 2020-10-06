<?php

namespace public_html\application\controllers;

use public_html\application\core\Controller;
use public_html\application\core\View;
use public_html\application\services\Flash;
use public_html\application\services\Pagination;
use public_html\application\services\Redirect;
use public_html\application\services\Session;
use public_html\application\services\CSRF;
use public_html\application\services\Validate;

class UserController extends Controller {

//    public function __construct($route)
//    {
//        parent::__construct($route);
//        if (!$_SESSION['auth']) {
//            echo 'вы не авторизованы';die;
//        }
//    }

    public function index()
    {
        $pagination = new Pagination($this->route, $this->model->recordCount());
        $vars = [
            'pagination' => $pagination->get(),
            'users' => $this->model->getAllRecord($this->getRoute()),
        ];
        $this->getView()->render('Главная страница', $vars);
    }

    public function create()
    {
        $vars = [
            'csrf' => CSRF::generate(),
        ];
        $this->getView()->render('Добавить сотрудника', $vars);

    }

    public function store()
    {
        $validate = new Validate($this->model->getDbDriver());
        $validate->check($_POST,$this->model->getRules());
        if (!$validate->passed()) {
            $errors = $validate->errors();
            $errors = implode("<br>",$errors);
            Flash::flash('errors', "$errors");
            Redirect::redirect('user/create');
        }

        $this->model->addRecord($_POST);
        Flash::flash('success', 'Сотрудник добавлен!');
        Redirect::redirect('');
    }

    public function show()
    {
        if (!$this->model->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $vars = [
            'data' => $this->model->getOne($this->route['id'])[0],
        ];
        $this->getView()->render('Пост', $vars);
    }

    public function edit()
    {
        if (!$this->model->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $vars = [
            'data' => $this->model->getOne($this->route['id'])[0],
            'csrf' => CSRF::generate(),
            'id' => $this->route['id'],
        ];
        $this->getView()->render('Добавить сотрудника', $vars);
    }

    public function update()
    {
        if (CSRF::check($_POST['csrf'])) {
            if (!$this->model->isRecordExists($this->route['id'])) {
                $this->getView()->errorCode(404);
            }

            $validate = new Validate($this->model->getDbDriver());
            $validate->check($_POST,$this->model->getRules());
            if (!$validate->passed()) {
                $errors = $validate->errors();
                $errors = implode("<br>",$errors);
                Flash::flash('errors', "$errors");
                $id = $_POST['id'];
                Redirect::redirect("user/edit/$id");
            }

            $this->model->recordUpdate($this->route['id']);
            Flash::flash('success', 'Данные о сотруднике изменены!');
            Redirect::redirect('');
        } else {
            View::errorCode(403);
        }
    }

    public function destroy()
    {
        if (!$this->model->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $this->model->recordDelete($this->route['id']);
        Flash::flash('success', 'Сотрудник удален!');
        Redirect::redirect('');

    }

}