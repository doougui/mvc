<?php 
    global $groups;

    $groups = [
        "main" => [
            "namespace" => "App\Controllers\Main",
            "group" => null,
            "routes" => [
                [
                    "method" => "get",
                    "route" => "/",
                    "handler" => "MainController:index"
                ],
                [
                    "method" => "get",
                    "route" => "/home",
                    "handler" => "MainController:index"
                ]
            ]
        ],

        "blog" => [
            "namespace" => "App\Controllers\Blog",
            "group" => "blog",
            "routes" => [
                [
                    "method" => "get",
                    "route" => "/",
                    "handler" => "BlogController:index"
                ],
                [
                    "method" => "get",
                    "route" => "/post/{post_id}/{post_slug}",
                    "handler" => "PostController:index"
                ]
            ]
        ],

        "error" => [
            "namespace" => "App\Controllers\Error",
            "group" => "ooops",
            "routes" => [
                [
                    "method" => "get",
                    "route" => "/{errcode}",
                    "handler" => "ErrorController:index"
                ]
            ]
        ]
    ];