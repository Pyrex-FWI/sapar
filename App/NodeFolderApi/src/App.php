<?php

namespace NodeFolderApi;

use NodeFolderApi\Controller\ListDirectoryController;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

class App
{
  /**
   * @var \Slim\App
   */
  private static $app;

  private function __construct()
  {
  }

  /**
   * @return \Slim\App
   */
  public static function create()
  {
    if (!static::$app) {
     static::$app = AppFactory::create();
    }

    static::$app->post('/nodes', ListDirectoryController::class . ':getChildren');

    return static::$app;
  }
}
