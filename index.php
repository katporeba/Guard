<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('search', 'DefaultController');
Routing::get('chooseAnimal', 'DefaultController');
Routing::post('login', 'SecurityController');
Routing::post('addProject', 'ProjectController');
Routing::get('signUp', 'DefaultController');

Routing::run($path);