<?php 

namespace public_html\application\models;

use public_html\application\core\Model;

class User extends Model
{
	public $error;
    private const TABLE = 'users';
    private $rules = [
        'password' => [
            'required' => true,
        ],
        'login' => [
            'required' => true,
            'unique' => 'users',
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

    public function getRules()
    {
        return $this->rules;
    }


}