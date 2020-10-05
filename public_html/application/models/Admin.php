<?php

namespace public_html\application\models;

use public_html\application\core\Model;

class Admin extends Model
{

    private $rules = [
        'password' => [
            'required' => true,
        ],
        'login' => [
            'required' => true,
        ],
    ];

    public function __construct($dbDriver, $table)
    {
        parent::__construct($dbDriver, $table);
        $this->dbDriver = $dbDriver;
        $this->table = "users";
    }

    public function getRules()
    {
        return $this->rules;
    }


}