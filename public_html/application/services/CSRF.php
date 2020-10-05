<?php

namespace public_html\application\services;

class CSRF
{

    const TOKEN_NAME = 'csrf';

	public static function generate() {

	    return Session::put(CSRF::TOKEN_NAME, md5(uniqid()));

	}

	public static function check ($token) {

		if (Session::exists(CSRF::TOKEN_NAME) && $token == Session::get(CSRF::TOKEN_NAME)) {
			Session::delete(CSRF::TOKEN_NAME);
			return true;
		}

		return false;
	}
}
