<?php

declare(strict_types=1);
session_start();

date_default_timezone_set("America/Sao_Paulo");

header("Content-Type: text/html; charset=utf-8");
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

require_once("../config/routes.php");
require_once("../vendor/autoload.php");

$dotenv = \Dotenv\Dotenv::createImmutable(SITE["root"]);
$dotenv->load();

$dispatch = new App\Dispatch();
$dispatch->bootstrap($routes);