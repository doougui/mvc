<?php 
	# Arquivos, diretórios e raizes.
	$pasta_interna = "mvc_webdesignemfoco/";
	define('DIRPAGE',"http://{$_SERVER['HTTP_HOST']}/{$pasta_interna}");

	if (substr($_SERVER['DOCUMENT_ROOT'], -1) == '') {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}{$pasta_interna}/");
	} else {
		define('DIRREQ', "{$_SERVER['DOCUMENT_ROOT']}/{$pasta_interna}/");
	}

	# Diretórios Específicos
	define('DIRIMG', DIRPAGE."public/img/");
	define('DIRCSS', DIRPAGE."public/css/");
	define('DIRJS', DIRPAGE."public/js/");
	define('DIRVID', DIRPAGE."public/video/");
	define('DIRAUD', DIRPAGE."public/audio/");
	define('DIRFONT', DIRPAGE."public/fontes/");
	define('DIRDESIGN', DIRPAGE."public/design/");
	define('DIRADM', DIRPAGE."public/admin/");

	# Acesso ao banco de dados
	define('HOST', "localhost");
	define('DB', "mvc_completo");
	define('USER', "root");
	define('PASS', "");