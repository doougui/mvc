<?php 
	require('environment.php');

	// Files, folders, etc
	$inner_folder = "estrutura_mvc/";
	define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$inner_folder}");

	if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '/') {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$inner_folder}");
	} else {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$inner_folder}");
	}

	// Global folders
	define('DIRIMG', DIRPAGE."public/img/");
	define('DIRCSS', DIRPAGE."public/css/");
	define('DIRJS', DIRPAGE."public/js/");
	define('DIRVID', DIRPAGE."public/video/");
	define('DIRAUD', DIRPAGE."public/audio/");
	define('DIRFONT', DIRPAGE."public/fontes/");
	define('DIRDESIGN', DIRPAGE."public/design/");

	// Database connection
	$config = array();

	if (ENVIRONMENT == 'development') {
		$config['dbname'] = 'estrutura_mvc';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	} else {
		$config['dbname'] = 'estrutura_mvc';
		$config['host'] = 'localhost';
		$config['dbuser'] = 'root';
		$config['dbpass'] = '';
	}