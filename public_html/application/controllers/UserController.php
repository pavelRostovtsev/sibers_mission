<?php

namespace public_html\application\controllers;

use public_html\application\core\Controller;
use public_html\application\services\Pagination;
use public_html\application\services\Redirect;
use public_html\application\services\Session;
use public_html\application\services\CSRF;

class UserController extends Controller {

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
        $this->model->addRecord($_POST);
        Session::flash('success', 'Сотрудник добавлен!');
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
        ];
        $this->getView()->render('Добавить сотрудника', $vars);
    }

    public function update()
    {
        var_dump($_POST['csrf']);die;
        var_dump(CSRF::check($_POST['CSRF']));die;
        if (!$this->model->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $this->model->recordUpdate($this->route['id']);
        Session::flash('success', 'Данные о сотруднике изменены!');
        Redirect::redirect('');

    }

    public function destroy()
    {
        if (!$this->model->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $this->model->recordDelete($this->route['id']);
        Session::flash('success', 'Сотрудник удален!');
        Redirect::redirect('');

    }

}