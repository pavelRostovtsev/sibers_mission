<?php

namespace public_html\application\controllers;

use public_html\application\core\Controller;
use public_html\application\core\View;
use public_html\application\services\Pagination;
use public_html\application\services\Redirect;
use public_html\application\services\Session;
use public_html\application\services\CSRF;

class UserController extends Controller {

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
        echo '1';
    }


}