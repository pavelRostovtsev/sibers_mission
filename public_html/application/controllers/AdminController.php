<?php

namespace public_html\application\controllers;

use public_html\application\core\Controller;
use public_html\application\core\View;
use public_html\application\services\Flash;
use public_html\application\services\Redirect;
use public_html\application\services\Session;
use public_html\application\services\CSRF;
use public_html\application\services\Validate;
use public_html\application\services\Auth;

class AdminController extends Controller {

    const ROLESADMIN = 1;
//    public function __construct($route)
//    {
//        parent::__construct($route);
//        if (!$_SESSION['auth']) {
//            echo 'вы не авторизованы';die;
//        }
//    }
    public function signIn()
    {
        if (Session::exists('admin')) {
            Redirect::redirect('');
        }
        $this->getView()->render('Форма авторизации');
    }

    public function authorization()
    {

        if (Session::exists('admin')) {
            Redirect::redirect('');
        }
        if (!$_POST) {
            Redirect::redirect('admin/sign-in');
        }

        if (CSRF::check($_POST['csrf'])) {
            $this->getView()->errorCode(404);
        }
        $validate = new Validate($this->model->getDbDriver());
        $validate->check($_POST, $this->model->getRules());

        if (!$validate->passed()) {
            $errors = $validate->errors();
            $errors = implode("<br>", $errors);
            Flash::flash('errors', "$errors");
            Redirect::redirect('admin/sign-in');
        }

        $admin = new Auth($this->model);
        $admin = $admin->login($_POST['login']);
        if ($admin == true) {
            Flash::flash('success', "Вы успешно авторизовались");
            Redirect::redirect('');
        } else {
            Flash::flash('errors', "Пароль или догин не верен, а может ты просто не админ, я сказал бы точнее но не успеваю :(");
            Redirect::redirect('admin/sign-in');


        }

    }

    public function logOut()
    {
        $admin = new Auth($this->model);
        $admin = $admin->logOut('admin');
        Redirect::redirect('admin/sign-in');
    }


}