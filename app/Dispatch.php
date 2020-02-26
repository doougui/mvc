<?php

namespace App;

use \CoffeeCode\Router\Router;

class Dispatch
{
    /**
     * Application bootstrapper
     * @param array $routes
     */
    public function bootstrap(): void
    {
        $router = new Router(site());

        /**
         * HOME
         */
        $router->namespace("App\Controllers");
        $router->group(null);
        $router->get("/", "HomeController:index", "home.index");
        $router->get("/home", "HomeController:index", "home.home");
        
        /**
         * ERROR
         */
        $router->namespace("App\Controllers\Error");
        $router->group("ooops");
        $router->get("/{errcode}", "ErrorController:index", "error");

        $router->dispatch();

        if ($router->error()) {
            $router->redirect("/ooops/{$router->error()}");
        }
    }
}