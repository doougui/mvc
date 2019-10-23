<?php

namespace App;

use \CoffeeCode\Router\Router;

class Dispatch
{
    public function run(array $groups)
    {
        $router = new Router(DIRPAGE);

        foreach ($groups as $group) {
            $router -> group($group['group']) -> namespace($group['namespace']);

            foreach ($group['routes'] as $route) {
                call_user_func_array([$router, $route['method']], [$route['route'], $route['handler']]);
            }
        }

        // Dispatch
        $router -> dispatch();

        // Get error
        if ($router -> error()) {
            $router -> redirect("/ooops/{$router -> error()}");
        }
    }
}