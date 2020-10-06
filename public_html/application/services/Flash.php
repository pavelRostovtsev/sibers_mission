<?php

namespace public_html\application\services;

use public_html\application\services\Session;

class Flash
{
    public static function flash($name, $string = '')
    {
        if(Session::exists($name) && Session::get($name) !=='') {
            $session = Session::get($name);
            Session::delete($name);
            return $session;
        } else {
            Session::put($name,$string);
        }
    }

    public static function existsFlash($name)
    {
        return ($_SESSION[$name] == '') ? true:false;
    }
}