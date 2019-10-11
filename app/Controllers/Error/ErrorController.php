<?php 
	namespace App\Controllers\Error;

	use App\Controllers\Render;
	use Src\Interfaces\InterfaceView;

	class ErrorController extends Render implements InterfaceView {
		public function index(array $urlData) {
			$viewData = [];

			$this -> setDir("Error/Error");
			$this -> setTitle("MVC - Erro {$urlData["errcode"]}");
			$this -> setDescription("Erro {$urlData["errcode"]}.");
			$this -> setKeywords("erro {$urlData["errcode"]}, http code, error");

			$viewData["errorCode"] = $urlData["errcode"];

			switch ($urlData['errcode']) {
				case 400:
					$viewData["errorDesc"] = "Requisição inválida";
					break;
				case 404:
					$viewData["errorDesc"] = "Não encontrado";
					break;
				case 405:
					$viewData["errorDesc"] = "Método não permitido";
					break;
				case 501:
					$viewData["errorDesc"] = "Não implementado";
					break;
				default:
					$viewData["errorDesc"] = "Não foi possível acessar está página";
					break;
			}

			$this -> renderLayout($viewData);
		}
	}