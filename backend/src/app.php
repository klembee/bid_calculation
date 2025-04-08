<?php

use App\Controllers\CalculationController;
use Slim\Factory\AppFactory;
use DI\Container;

require __DIR__ . '/../vendor/autoload.php';

// Set up container (if using PHP-DI)
$container = new Container();
$container->set(CalculationController::class, \DI\autowire());
AppFactory::setContainer($container);

// Create Slim app
$app = AppFactory::create();

$app->addBodyParsingMiddleware();

// CORS middleware
require __DIR__ . '/Middlewares/cors.php';

// Add routes
require __DIR__ . '/routes.php';

return $app;