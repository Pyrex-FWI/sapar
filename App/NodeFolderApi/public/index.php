<?php

use NodeFolderApi\App;
use NodeFolderApi\Controller\ListDirectoryController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = App::create();

$app->run();
