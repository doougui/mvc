<?php 
	namespace App\Controller;

	use App\Model\ClassLogin;
	use \Src\Classes\ClassRender;

	class ControllerLogin extends ClassLogin {
		use \Src\Traits\TraitUrlParser;

		public function __construct() {
			if (count($this -> parseUrl()) === 1) {
				$render = new ClassRender();

				$render -> setDir('login');
				$render -> setTitle('MVC - Login');
				$render -> setDescription('Faça seu login.');
				$render -> setKeywords('login de clientes, login');
				$render -> renderLayout();
			}
		}

		# Validar o login do usuário
		public function validarLogin() {
			$validacao = $this -> validarUsuario($_POST['usuario'], md5($_POST['senha']));

			if ($validacao == true) {
				echo "Login efetuado.";
			} else {
				echo "Não foi possível logar.";
			}
		}
	}