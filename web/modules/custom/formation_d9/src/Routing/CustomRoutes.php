<?php

namespace Drupal\formation_d9\Routing;

use Symfony\Component\Routing\Route;

class CustomRoutes
{
    public function routes()
    {
        $routes = [];
        // Create mypage route programmatically
        $routes['formation_d9.dynapage'] = new Route(
    // Path definition
      'dynamic-page',
    // Route defaults
      [
        '_controller' => '\Drupal\formation_d9\Controller\DefaultController::customPage',
        '_title' => 'My custom page',
      ],
      // Route requirements
      [
        '_permission' => 'access content',
      ]
    );

        return $routes;
    }
}
