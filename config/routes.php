<?php 
    $routes = [
        [
            "namespace" => "App\Controllers",
            "group" => null,
            "routes" => [
                [
                    "method" => "get",
                    "route" => "/",
                    "handler" => "HomeController:index",
                    "name" => "home.index"
                ],
                [
                    "method" => "get",
                    "route" => "/home",
                    "handler" => "HomeController:index",
                    "name" => "home.home"
                ]
            ]
        ],

        [
            "namespace" => "App\Controllers\Error",
            "group" => "ooops",
            "routes" => [
                [
                    "method" => "get",
                    "route" => "/{errcode}",
                    "handler" => "ErrorController:index",
                    "name" => "error"
                ]
            ]
        ]
    ];