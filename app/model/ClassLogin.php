<?php 
	namespace App\Model;

	use App\Model\ClassConexao;

	class ClassLogin extends ClassConexao {

		# Validar o usuário no banco
		protected function validarUsuario($usuario, $senha) {
			$bfetch = $this -> conexaoDB() -> prepare('SELECT * FROM login WHERE usuario = :usuario AND senha = :senha');
			$bfetch -> bindParam(":usuario", $usuario, \PDO::PARAM_STR);
			$bfetch -> bindParam(":senha", $senha, \PDO::PARAM_STR);
			$bfetch -> execute();

			if ($row = $bfetch -> rowCount() > 0) {
				return true;
			} else {
				return false;
			}
		}
	}