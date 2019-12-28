<?php

/**
 * SITE CONFIG
 */
define("SITE", [
    "name" => getenv("name") ?: "mvc",
    "desc" => getenv("description") ?: "MVC folder structure based on PHP",
    "domain" => getenv("domain") ?: "localhost",
    "locale" => getenv("locale") ?: "en_US",
    "root" => getenv("root") ?: "C:/wamp/www/mvc",
    "base" => getenv("base") ?:
        "http://localhost".getenv("webpack" ? ":8080" : "")."/mvc"
]);

/**
 * DATABASE CONFIG
 */
define("DB_CONFIG", [
    "driver" => getenv("DB_CONNECTION") ?: "mysql",
    "host" => getenv("DB_HOST") ?: "localhost",
    "port" => getenv("DB_PORT") ?: "3306",
    "dbname" => getenv("DB_DATABASE") ?: "mvc",
    "username" => getenv("DB_USERNAME") ?: "root",
    "password" => getenv("DB_PASSWORD") ?: "",
    "charset" => getenv("DB_CHARSET") ?: "utf8mb4",
    "options" => [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);