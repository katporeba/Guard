<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/ProjectController.php';

class Routing {
    // tablica przechowująca url oraz adekwatne do niego sciezki kontrolera
    public static $routes;

    public static function get($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function post($url, $view) {
        self::$routes[$url] = $view;
    }

    public static function run ($url) {
        // wyciągamy pierwszy moduł url i sprawdzenie czy url istnieje
        $action = explode("/", $url)[0];
        if (!array_key_exists($action, self::$routes)) {
            die("Wrong url!");
        }

        $controller = self::$routes[$action];
        $object = new $controller;
        $action = $action ?: 'index';

        $object->$action();
    }
}