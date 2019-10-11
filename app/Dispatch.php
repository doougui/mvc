<?php 
	namespace App;
	
	use \CoffeeCode\Router\Router;

	class Dispatch {
		public function run() {
			$router = new Router(DIRPAGE);

			// Home controllers
			$router -> namespace("App\Controllers\Main");

			// Home routes
			$router -> group(null);
			$router -> get("/", "MainController:index");
			$router -> get("/home", "MainController:index");

			// Blog controllers
			$router -> namespace("App\Controllers\Blog");

			// Blog routesb
			$router -> group("blog");
			$router -> get("/", "BlogController:index");
			$router -> get("/post/{post_id}/{post_slug}", "PostController:index");

			// Error controllers
			$router -> namespace("App\Controllers\Error");

			// Error routes
			$router -> group("ooops");
			$router -> get("/{errcode}", "ErrorController:index");

			// Dispatch
			$router -> dispatch();

			// Get error
			if ($router -> error()) {
				$router -> redirect("/ooops/{$router -> error()}");
			}
		}
	}