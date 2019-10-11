<?php 
	namespace App\Controllers;

	use App\Controllers\Render;
	use App\Models\User;
	use Src\Interfaces\InterfaceView;

	class HomeController extends Render implements InterfaceView {
		public function index() {
			$data = [];

			$user = new User();

			$this -> setDir('Home');
			$this -> setTitle('MVC - Home');
			$this -> setDescription('Estrutura MVC do curso de MVC completo.');
			$this -> setKeywords('mvc completo, estrutura mvc');

			$data['users'] = $user -> getUsers();

			$this -> renderLayout($data);
		}
	}