<?php 
	namespace App\Controller;

	use Src\Classes\ClassRender;
	use Src\Interfaces\InterfaceView;

	class Controller404 extends ClassRender implements InterfaceView {
		public function __construct() {
			$this -> setDir('404');
			$this -> setTitle('MVC - Erro 404');
			$this -> setDescription('Está página não existe.');
			$this -> setKeywords('pagina inexistente, erro 404');
			$this -> renderLayout();
		}
	}