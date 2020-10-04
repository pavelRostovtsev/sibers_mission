<?php

namespace public_html\application\services;

class Redirect
{
    public static function redirect($url)
    {
        header('location: /'.$url);
        exit;
    }
}