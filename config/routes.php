<?php

use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\Core\Configure;

Router::plugin('MakvilleMailer', ['path' => Configure::read('makville-mailer-path', '/makville-mailer')], function (RouteBuilder $routes) {
    $routes->fallbacks(DashedRoute::class);
});
