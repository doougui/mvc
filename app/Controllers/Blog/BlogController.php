<?php 
	namespace App\Controllers\Blog;

	use App\Controllers\Render;
	use App\Models\User;
	use Src\Interfaces\InterfaceView;

	class BlogController extends Render implements InterfaceView {
		public function index() {
			$viewData = [];

			$this -> setDir("Blog/Blog");
			$this -> setTitle("MVC - Blog");
			$this -> setDescription("Página de blog da estrutura MVC.");
			$this -> setKeywords("blog");

			$viewData["articles"] = ["Article 1", "Article 2", "Article 3"];

			$this -> renderLayout($viewData);
		}
	}