<?php 
	namespace App\Controller;

	use Src\Classes\ClassRender;
	use Src\Interfaces\InterfaceView;

	class ControllerHome extends ClassRender implements InterfaceView {
		public function __construct() {
			$this -> setDir('home/');
			$this -> setTitle('MVC - Home');
			$this -> setDescription('Estrutura MVC do curso de MVC completo.');
			$this -> setKeywords('mvc completo, estrutura mvc');
			$this -> renderLayout();
		}
	}