<?php

declare(strict_types=1);

session_start();

require dirname(__DIR__, 1)."/vendor/autoload.php";

$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 1));
$dotenv->load();

require dirname(__DIR__, 1)."/config/Config.php";

header("Content-Type: text/html; charset=utf-8");
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

$dispatch = new App\Dispatch();
$dispatch->bootstrap();