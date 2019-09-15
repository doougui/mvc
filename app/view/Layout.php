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
	<?= $this -> addHead() ?>
</head>
<body>
	<nav>
		<a href="<?= DIRPAGE ?>">Home</a>	
		<a href="<?= DIRPAGE.'contato' ?>">Contato</a>	
	</nav>

	<header>
		<img src="<?= DIRIMG.'holanda.jpg' ?>" width="100%" alt="Banner">
		<p>Tel: (48) 99999-9999</p>
		<?= $this -> addHeader() ?>
	</header>

	<main>
		<?= $this -> addMain() ?>
	</main>

	<footer>
		<p>2019 - TODOS OS DIREITOS RESERVADOS</p><br>
		<?= $this -> addFooter() ?>
	</footer>
</body>
</html>