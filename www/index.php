<?php

function my_autoload(string $className) {
    require_once __DIR__ . '/../src/' . $className . '.php';
}
spl_autoload_register('my_autoload');



$route = $_GET['route'] ?? '';
$routes = require __DIR__ . '/../src/routes.php';
var_dump($routes);

