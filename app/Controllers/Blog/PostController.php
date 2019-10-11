<?php 
	namespace App\Controllers\Blog;

	use App\Controllers\Render;
	use App\Models\User;
	use Src\Interfaces\InterfaceView;

	class PostController extends Render implements InterfaceView {
		public function index(array $urlData) {
			$viewData = [];

			$this -> setDir("Blog/Post");
			$this -> setTitle("MVC - Post");
			$this -> setDescription("Página da postagem do blog.");
			$this -> setKeywords("blog, post");

			$viewData["post"] = [
				"id" => $urlData["post_id"],
				"slug" => $urlData["post_slug"],
				"title" => "Post title",
				"content" => "It's the post content"
			];

			$this -> renderLayout($viewData);
		}
	}