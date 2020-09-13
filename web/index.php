<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Register view rendering
$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));

if (!empty($_REQUEST['submit'])) {
  require_once("./signup.php");
}

// Our web handlers
$app->get('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('zoom.twig');
});

$app->post('/signup', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return $app['twig']->render('signup.twig');
});

$app->run();
  
