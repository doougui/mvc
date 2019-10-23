<?php

header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding("UTF-8");
mb_http_output("UTF-8");

require_once('../config/config.php');
require_once('../config/routes.php');
require_once('../src/vendor/autoload.php');

$dispatch = new App\Dispatch();
$dispatch -> run($groups);