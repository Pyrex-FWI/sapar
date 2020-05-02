<?php

namespace NodeFolderApi\Controller;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Sapar\Console\ReleaseDispatcher\SaparFinder\SaparFinder;
use Sapar\Console\ReleaseDispatcher\Tests\AlbumReleaseDirectoryTrait;

class ListDirectoryController
{
  use AlbumReleaseDirectoryTrait;

  protected $container;

  // constructor receives container instance
  public function __construct() {
//    $this->container = $container;
  }

  public function getChildren(RequestInterface $request, ResponseInterface $response, $args) {
    $body = $request->getBody();

    $path = $this->generateDirectories();
    $f = SaparFinder::createAlbumReleaseFinder('vfs://saparNas');
    $payload = json_encode($f->getAlbumReleases(), JSON_OBJECT_AS_ARRAY);
    $response->getBody()->write($payload);
    $response->withHeader('Content-Type', 'application/json');

    return $response;
  }

  public function contact($request, $response, $args) {
    // your code
    // to access items in the container... $this->container->get('');
    return $response;
  }
}
