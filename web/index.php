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

if (!empty($_REQUEST['signup']) && !empty($_REQUEST['submit'])) {
  require_once("./signup.php");
}

// Our web handlers
$app->post('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  $view = empty($_REQUEST['signup']) ? 'zoom' : 'signup';
  return $app['twig']->render($view . '.twig');
});

$app->run();
  
