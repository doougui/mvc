<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Douglas Pinheiro Goulart">
	<meta name="description" content="<?= $this -> getDescription() ?>">
	<meta name="keywords" content="<?= $this -> getKeywords() ?>">
	<title><?= $this -> getTitle() ?></title>
	<link rel="stylesheet" href="<?= DIRCSS.'style.css' ?>">
	<?= $this -> addExtraHead($viewData) ?>
</head>
<body>
	<br>
	<nav>
		<a href="<?= DIRPAGE ?>">Home</a>	
		<a href="<?= DIRPAGE.'blog' ?>">Blog</a>		
	</nav>
	
	<br>
	<hr>
	<br>

	<header>
		<?php 
			$breadcrump = new Src\Classes\ClassBreadcrumb();
			echo $breadcrump -> addBreadcrumb();
		?>
		<br>
		<p>Tel: (48) 99999-9999</p>
		<?= $this -> addExtraHeader($viewData) ?>
	</header>

	<br>
	<hr>
	<br>

	<main>
		<br>
		<?= $this -> addMainContent($viewData) ?>
		<br>
	</main>
	
	<br>
	<hr>
	<br>

	<footer>
		<p>2019 - TODOS OS DIREITOS RESERVADOS</p><br>
		<?= $this -> addExtraFooter($viewData) ?>
	</footer>
</body>
</html>