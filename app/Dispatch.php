<?php

namespace App;

use \CoffeeCode\Router\Router;

class Dispatch
{
    /**
     * Application bootstrapper
     * @return void
     */
    public function bootstrap(): void
    {
        $router = new Router(site());

        /**
         * Home
         */
        $router->namespace("App\Controllers");

        $router->group(null);
        $router->get("/", "HomeController:index", "home.index");
        $router->get("/home", "HomeController:index", "home.home");

        /**
         * Login
         */
        $router->namespace("App\Controllers\Auth");

        $router->group(null);
        $router->get("/login", "LoginController:showLoginForm", "login");
        $router->post("/login", "LoginController:login", "login.auth");
        $router->get("/disconnect", "LoginController:disconnect", "login.disconnect");
        $router->get("/facebook", "LoginController:facebook", "login.facebook");
        $router->get("/google", "LoginController:google", "login.google");
        $router->get("/logout", "LoginController:logout", "login.logout");

        /**
         * Registration
         */
        $router->get("/register", "RegisterController:showRegistrationForm", "register");
        $router->post("/register", "RegisterController:register", "register.auth");

        /**
         * Password recovering
         */
        $router->get("/recover", "ForgotPasswordController:showRecoveringForm", "forgotPassword");
        $router->post("/forget", "ForgotPasswordController:forget", "forgotPassword.forget");

        /**
         * Password reset
         */
        $router->get("/password/{email}/{forget}", "ResetPasswordController:showResetForm", "resetPassword");
        $router->post("/reset", "ResetPasswordController:reset", "resetPassword.reset");

        /**
         * Error
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