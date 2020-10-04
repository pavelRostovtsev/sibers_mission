<?php 

namespace public_html\application\models;

use public_html\application\core\Model;
use public_html\application\core\DB;
use public_html\application\services\DBDriver;


class User extends Model
{

	public $error;
    private const TABLE = 'users';

}