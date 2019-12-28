<?php

require("environment.php");

// Files, folders, etc
$innerFolder = "mvc/";
define("DIRPAGE", "http://{$_SERVER["HTTP_HOST"]}/{$innerFolder}");

if (substr($_SERVER["DOCUMENT_ROOT"], -1) == "/") {
    define("DIRREQ", "{$_SERVER["DOCUMENT_ROOT"]}{$innerFolder}");
} else {
    define("DIRREQ", "{$_SERVER["DOCUMENT_ROOT"]}/{$innerFolder}");
}

// Global folders
define("DIRIMG", DIRPAGE."resources/img/");
define("DIRCSS", DIRPAGE."resources/css/");
define("DIRVID", DIRPAGE."resources/video/");
define("DIRAUD", DIRPAGE."resources/audio/");
define("DIRFONT", DIRPAGE."resources/font/");
define("DIRDESIGN", DIRPAGE."resources/design/");

// Database config
if (ENVIRONMENT == "development") {
    define("DIRJS", "http://{$_SERVER["HTTP_HOST"]}:8080/");

    define("DB_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "database",
        "username" => "root",
        "password" => "",
        "charset" => "utf8mb4",
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
} else {
    define("DIRJS", DIRPAGE."resources/js/dist/");

    define("DB_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "database",
        "username" => "root",
        "password" => "",
        "charset" => "utf8mb4",
        "options" => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
}