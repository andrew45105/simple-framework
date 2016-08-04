<?php

require __DIR__.'/../vendor/autoload.php';

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$container = new League\Container\Container;

$container->share('response', Zend\Diactoros\Response::class);
$container->share('request', function () {
    return Zend\Diactoros\ServerRequestFactory::fromGlobals(
        $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
    );
});

$container->share('emitter', Zend\Diactoros\Response\SapiEmitter::class);

$route = new League\Route\RouteCollection($container);

/* Add your route rules here */

$route->group('/', function ($route) {
    $route->map(
        'GET',
        '/',
        'Andrew45105\SF\Controller\IndexController::indexAction'
    );
    $route->map(
        'GET',
        '/other',
        'Andrew45105\SF\Controller\IndexController::otherAction'
    );
});

$response = $route->dispatch($container->get('request'), $container->get('response'));

$container->get('emitter')->emit($response);
