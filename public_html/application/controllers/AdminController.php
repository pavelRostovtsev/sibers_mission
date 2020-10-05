<?php

namespace public_html\application\controllers;

use public_html\application\core\Controller;
use public_html\application\core\View;
use public_html\application\services\Redirect;
use public_html\application\services\Session;
use public_html\application\services\CSRF;
use public_html\application\services\Validate;

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
        $this->getView()->render('Форма авторизации');
    }

    public function authorization()
    {
        $validate = new Validate($this->model->getDbDriver());
        $validate->check($_POST,$this->model->getRules());
        if (!$validate->passed()) {
            $errors = $validate->errors();
            $errors = implode("<br>",$errors);
            Session::flash('errors', "$errors");
            Redirect::redirect('admin/sign-in');
        }

    }


}