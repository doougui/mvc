<?php

namespace App\Core;

use \CoffeeCode\Router\Router;

class Dispatch
{
    /**
     * Application bootstrapper
     *
     * @param array $groups
     */
    public function run(array $groups): void
    {
        $router = new Router(DIRPAGE);

        foreach ($groups as $group) {
            $router->group($group["group"])->namespace($group["namespace"]);

            foreach ($group["routes"] as $route) {
                call_user_func_array(
                    [$router, $route["method"]], 
                    [$route["route"], $route["handler"], $route["name"]]
                );
            }
        }

        $router->dispatch();

        if ($router->error()) {
            $router->redirect("/ooops/{$router->error()}");
        }
    }
}