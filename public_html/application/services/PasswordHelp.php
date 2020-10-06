<?php

namespace public_html\application\services;

class PasswordHelp
{
    public static function passHash($password, $algo = PASSWORD_DEFAULT)
    {
        return password_hash($password, $algo);
    }
    public static function passCheck($password, $hash)
    {
        return password_verify($password, $hash);
    }
}