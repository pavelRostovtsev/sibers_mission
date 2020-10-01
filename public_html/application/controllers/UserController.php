<?php

namespace public_html\application\controllers;

use public_html\application\core\Controller;
use public_html\application\lib\Pagination;
use public_html\application\core\User;

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
        $this->getView()->render('Добавить сотрудника');
    }

    public function store()
    {
        $this->model->addRecord($_POST);
        $this->getView()->message('success', 'Пост добавлен');
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
        ];
        $this->getView()->render('Добавить сотрудника', $vars);
    }

    public function update()
    {
        if (!$this->model->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $this->model->recordUpdate($this->route['id']);
        $this->getView()->redirect('');

    }

    public function destroy()
    {
        if (!$this->getView()->isRecordExists($this->route['id'])) {
            $this->getView()->errorCode(404);
        }
        $this->model->recordDelete($this->route['id']);
        $this->getView()->redirect('');

    }

}