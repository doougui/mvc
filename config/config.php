<?php 
	require('environment.php');

	// Files, folders, etc
	$innerFolder = "estrutura_mvc/";
	define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$innerFolder}");

	if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$innerFolder}");
	} else {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$innerFolder}");
	}

	// Global folders
	define('DIRIMG', DIRPAGE."public/img/");
	define('DIRCSS', DIRPAGE."public/css/");
	define('DIRJS', DIRPAGE."public/js/");
	define('DIRVID', DIRPAGE."public/video/");
	define('DIRAUD', DIRPAGE."public/audio/");
	define('DIRFONT', DIRPAGE."public/font/");
	define('DIRDESIGN', DIRPAGE."public/design/");

	// Database config
	if (ENVIRONMENT == 'development') {
		define("DB_CONFIG", [
			"driver" => "mysql",
			"host" => "localhost",
			"port" => "3306",
			"dbname" => "estrutura_mvc",
			"username" => "root",
			"password" => "",
			"charset" => "utf8mb4",
			"options" => [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			]
		]);
	} else {
		define("DB_CONFIG", [
			"driver" => "mysql",
			"host" => "localhost",
			"port" => "3306",
			"dbname" => "estrutura_mvc",
			"username" => "root",
			"password" => "",
			"charset" => "utf8mb4",
			"options" => [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			]
		]);
	}