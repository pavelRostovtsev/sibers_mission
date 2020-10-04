<?php 
session_start();

use public_html\application\core\Router;

spl_autoload_register(function ($className)
    {
    if (file_exists(__DIR__ .DIRECTORY_SEPARATOR . str_replace('\\', '/' , $className ) .'.php')) {
    	include_once __DIR__ .DIRECTORY_SEPARATOR . str_replace('\\', '/' , $className ) .'.php' ;
    } 
});

$router = new Router;
$router -> run();
 

 