<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;

	class NotfoundController extends Render implements InterfaceView {
		public function index() {
			$data = [];

			$this -> setDir('404');
			$this -> setTitle('MVC - Erro 404');
			$this -> setDescription('Erro 404 - Página não encontrada.');
			$this -> setKeywords('erro 404, not found');

			$this -> renderLayout($data);
		}
	}