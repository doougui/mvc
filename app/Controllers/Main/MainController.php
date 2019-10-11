<?php 
	namespace App\Controllers\Main;

	use App\Controllers\Render;
	use App\Models\User;
	use Src\Interfaces\InterfaceView;

	class MainController extends Render implements InterfaceView {
		public function index() {
			$viewData = [];

			$user = new User();

			$this -> setDir("Main/Main");
			$this -> setTitle("MVC - Home");
			$this -> setDescription("Estrutura MVC.");
			$this -> setKeywords("mvc completo, estrutura mvc");

			$viewData["users"] = $user -> getUsers();

			$this -> renderLayout($viewData);
		}
	}