<?php

// Register global error and exception handlers
use Symfony\Component\Debug\ErrorHandler;
ErrorHandler::register();
use Symfony\Component\Debug\ExceptionHandler;
ExceptionHandler::register();

// Register service providers.
$app->register(new Silex\Provider\DoctrineServiceProvider());
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views',
));

// Register services.
$app['dao.family'] = $app->share(function ($app) {
    return new GSB\DAO\FamilyDAO($app['db']);
});
$app['dao.drug'] = $app->share(function ($app) {
    $drugDAO = new GSB\DAO\DrugDAO($app['db']);
    $drugDAO->setFamilyDAO($app['dao.family']);
    return $drugDAO;
});
$app['dao.practitioner'] = $app->share(function ($app){
    $pracDAO = new GSB\DAO\PractitionerDAO ($app['db']);
    $pracDAO->setType($app['dao.type']);
    return $pracDAO;
});
$app['dao.type'] = $app->share(function ($app) {
    return new GSB\DAO\TypeDAO($app['db']);
});