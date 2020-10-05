<?php 

namespace public_html\application\core;

use public_html\application\services\DBDriver;
use public_html\application\services\Validate;

abstract class Controller {

    public $route;
	public $view;

	public function __construct($route) {
		$this->route = $route;
		$this->view = new View($route);
		$this->model = $this->loadModel($route['controller']);

	}

	public function loadModel($name) {
		$path = 'public_html\application\models\\'.ucfirst($name);
		if (class_exists($path)) {
		    $db = DB::getConnect();
		    $dbDriver = new DBDriver($db);
		    $tableName = $name . 's';
			return new $path($dbDriver, $table = $tableName);
		}
	}

    public function getRoute()
    {
        return $this->route;
    }

    public function getView()
    {
        return $this->view;
    }

}