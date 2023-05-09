<?php

namespace App;

use App\Model\Human;
use App\Service\HumanService;
use App\Controller\HumanController;

include "vendor/autoload.php";

$newHuman = new Human();

$newHuman->name = 'Billy';

$newHumanService = new HumanService($newHuman);

$newController = new HumanController($newHumanService);

header('Content-Type: application/json; charset=utf-8');
echo json_encode($newController->GetName());
// echo phpinfo();
// use App\DTO\HttpStatus;
// use App\Router\SlimRouter;
// use DI\ContainerBuilder;
// use Exception;
// use ReflectionException;
// use Slim\App;
// use Throwable;

// include "vendor/autoload.php";
// require 'bootstrap.php';
// include 'env-init.php';

// $routes = include "routes.php";
// $dIConfig = include 'di-config.php';

// $dIContainerBuilder = new ContainerBuilder();
// $dIContainerBuilder->addDefinitions($dIConfig);

// $dIContainer = null;

// try {
//     $dIContainer = $dIContainerBuilder->build();
// } catch (Exception $e) {
//     header(HttpStatus::INTERNAL_SERVER_ERROR_MESSAGE, true, 500);
// }

// $slimApp = new App();

// try {
//     SlimRouter::getInstance($slimApp, $routes, $dIContainer);
// }
// catch (ReflectionException | Throwable $e) {
//     header(HttpStatus::getHeaderMessage(HttpStatus::INTERNAL_SERVER_ERROR_CODE, HttpStatus::INTERNAL_SERVER_ERROR_MESSAGE));
// }





