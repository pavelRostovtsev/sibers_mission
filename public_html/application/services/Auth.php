<?php

namespace public_html\application\services;

use public_html\application\services\PasswordHelp;
use public_html\application\services\Session;

class Auth
{
	private $db;
	private $date;
	private $session_name;
	private $isLoggendIn;
	const COOKIE_NAME = 'hash';
    const COOKIE_EXPIRY = 604800;
    const ADMIN_SESSION = 'admin';

	public function __construct($db,$user = null)
    {
		$this->db = $db;
	}
	public function create($fields = [])
    {
		$this ->db->insert('users',$fields);
	}

	public function login ($login = null , $password = null, $remember = false)
    {
        if ($login) {
            $user = $this->db->getOne_login($login);
            $checkPass = PasswordHelp::passCheck( $_POST['password'], $user['password']);
            $checkRoles = $user['roles'];
            if ($checkPass != false and $checkRoles == 1) {
                Session::put('admin', $user['id']);
                return true;
            } else {
                return false;
            }


        }
    }

    public function logOut()
    {
        Session::delete('admin');
    }

}