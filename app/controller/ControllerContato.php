<?php 
	namespace App\Controller;

	use Src\Classes\ClassRender;
	use Src\Interfaces\InterfaceView;

	class ControllerContato extends ClassRender implements InterfaceView {
		public function __construct() {
			$this -> setDir('contato');
			$this -> setTitle('MVC - Contato');
			$this -> setDescription('Entre em contato conosco.');
			$this -> setKeywords('contato, telefone, email');
			$this -> renderLayout();
		}
	}