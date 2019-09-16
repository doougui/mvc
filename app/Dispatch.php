<?php 	
	namespace App;

	use Src\Classes\ClassRoutes;

	class Dispatch extends ClassRoutes {

		# Atributos
		private $method;
		private $param = [];
		private $obj;
		private $url;

		# Getters e Setters
		protected function getMethod() { return $this -> method; }
		public function setMethod($method) { $this -> method = $method; }
		protected function getParam() { return $this -> param; }
		public function setParam($param) { $this -> param = $param; }

		# Método Construtor
		public function __construct() {
			$this -> url = $this -> parseUrl();
			self::addController();
		}

		# Método de adição do Controller
		private function addController($method_exists = true) {
			if ($method_exists == true) {
				$rotaController = $this -> getRota();
				$nameS = "App\\Controller\\{$rotaController}";

				if (isset($this -> url[1])) {
					self::addMethod();
				}
			} else {
				$nameS = "App\\Controller\\Controller404";
			}

			$this -> obj = new $nameS;
		}

		# Método de adição de método do Controller
		private function addMethod() {
			if (method_exists($this -> obj, $this -> url[1])) {
				$this -> setMethod($this -> url[1]);
				self::addParam();
				call_user_func_array([$this -> obj, $this -> getMethod()], $this -> getParam());
			} else {
				self::addController(false);
			}
		}

		# Método de adição de parâmetros do Controller
		private function addParam() {
			$contArray = count($this -> url);

			if ($contArray > 2) {
				foreach ($this -> url as $key => $value) {
					if ($key > 1) {
						if ($value == '' || $value == '/') {
							unset($this -> url[$key]);
						} else {
							$this -> setParam($this -> param += [$key => $value]);
						}
					}
				}
			}
		}
	}