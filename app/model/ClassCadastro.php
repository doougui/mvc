<?php 
	namespace App\Model;

	use App\Model\ClassConexao;

	class ClassCadastro extends ClassConexao {

		private $db;

		# Cadastrará os clientes no sistema
		protected function cadastroClientes($nome, $sexo, $cidade) {
			$this -> db = $this -> conexaoDB() -> prepare('INSERT INTO usuario (id, nome, sexo, cidade) VALUES (:id, :nome, :sexo, :cidade)');
			$this -> db -> bindParam(':id', $id, \PDO::PARAM_INT);
			$this -> db -> bindParam(':nome', $nome, \PDO::PARAM_STR);
			$this -> db -> bindParam(':sexo', $sexo, \PDO::PARAM_STR);
			$this -> db -> bindParam(':cidade', $cidade, \PDO::PARAM_STR);
			$this -> db -> execute();
		}
	}