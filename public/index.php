<?php

use app\core\Application;

require '../vendor/autoload.php';


$app = new Application;

$app->router->get('/', function(){
    echo 'hello world';
});

$app->run();