<?php

/**
 * SITE CONFIG
 */
define("SITE", [
    "name" => getenv("NAME") ?: "mvc",
    "desc" => getenv("DESCRIPTION") ?: "MVC folder structure based on PHP",
    "domain" => getenv("DOMAIN") ?: "localhost",
    "locale" => getenv("LOCALE") ?: "en_US",
    "root" => getenv("ROOT") ?:
        "http://localhost/mvc"
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

/**
 * MAIL
 */
define("MAIL", [
    "host" => getenv("MAIL_HOST"),
    "port" => getenv("MAIL_PORT"),
    "user" => getenv("MAIL_USER="),
    "passwd" => getenv("MAIL_PASSWD"),
    "from_name" => getenv("MAIL_FROMNAME"),
    "from_email" => getenv("MAIL_FROMEMAIL")
]);

/**
 * SOCIAL LOGIN: FACEBOOK
 */
define("FACEBOOK_LOGIN", [
    "clientId" => getenv("FACEBOOK_CLIENTID"),
    "clientSecret" => getenv("FACEBOOK_CLIENTSECRET"),
    "redirectUri" => SITE["root"]."/facebook",
    "graphApiVersion" => getenv("FACEBOOK_GRAPHAPIVERSION")
]);

/**
 * SOCIAL LOGIN: GOOGLE
 */
define("GOOGLE_LOGIN", [
    "clientId" => getenv("GOOGLE_CLIENTID"),
    "clientSecret" => getenv("GOOGLE_CLIENTSECRET"),
    "redirectUri" => SITE["root"]."/google"
]);