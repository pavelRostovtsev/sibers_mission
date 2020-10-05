<?php

namespace public_html\application\models;

use public_html\application\core\Model;

class Admin extends Model
{
    public $error;
    private const TABLE = 'users';
    private $rules = [
        'password' => [
            'required' => true,
        ],
        'login' => [
            'required' => true,
        ],
        'name' => [
            'required' => true,
        ],
        'surname' => [
            'required' => true,
        ],
        'gender' => [
            'required' => true,
        ],
        'date' => [
            'required' => true,
        ],

    ];


}