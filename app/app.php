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
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SecurityServiceProvider(), array(
    'security.firewalls' => array(
        'login' => array(
            'pattern' => '^/login$',
            'anonymous' => true
        ),
        'secured' => array(
            'pattern' => '^.*$',
            'logout' => true,
            'form' => array('login_path' => '/login', 'check_path' => '/login_check'),
            'users' => $app->share(function () use ($app) {
                return new GSB\DAO\VisitorDAO($app['db']);
            }),
        ),
    ),
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
$app['dao.visitor'] = $app->share(function ($app) {
    return new GSB\DAO\VisitorDAO($app['db']);
});