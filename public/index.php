<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: wheat;">
    
</body>
</html> 




<?php

use app\controllers\siteController;
use app\core\Application;

require '../vendor/autoload.php';  



$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/contact', [siteController::class, 'contactView']);
$app->router->post('/contact',[siteController::class, 'hanleContact']);

$app->run();
?>



