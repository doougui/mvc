<?php 
	namespace App\Model;

	use App\Model\ClassConexao;

	class ClassCadastro extends ClassConexao {

		private $db;

		# Cadastrará os clientes no sistema
		protected function cadastroClientes($nome, $sexo, $cidade) {
			$this -> db = $this -> conexaoDB() -> prepare('INSERT INTO usuario (nome, sexo, cidade) VALUES (:nome, :sexo, :cidade)');
			$this -> db -> bindParam(':nome', $nome, \PDO::PARAM_STR);
			$this -> db -> bindParam(':sexo', $sexo, \PDO::PARAM_STR);
			$this -> db -> bindParam(':cidade', $cidade, \PDO::PARAM_STR);
			$this -> db -> execute();
		}

		# Acesso ao banco de dados com seleção
		protected function selecionaClientes($nome, $sexo, $cidade) {
			$nome = '%'.$nome.'%';
			$sexo = '%'.$sexo.'%';
			$cidade = '%'.$cidade.'%';
			$bfetch = $this -> db = $this -> conexaoDB() -> prepare("
				SELECT * FROM usuario WHERE 
				nome LIKE :nome AND 
				sexo LIKE :sexo AND 
				cidade LIKE :cidade");
			$bfetch -> bindParam(':nome', $nome, \PDO::PARAM_STR);
			$bfetch -> bindParam(':sexo', $sexo, \PDO::PARAM_STR);
			$bfetch -> bindParam(':cidade', $cidade, \PDO::PARAM_STR);
			$bfetch -> execute();

			$array = array();
			$I = 0;
			while ($fetch = $bfetch -> fetch(\PDO::FETCH_ASSOC)) {
				$array[$I] = ['id' => $fetch['id'], 'nome' => $fetch['nome'], 'sexo' => $fetch['sexo'], 'cidade' => $fetch['cidade']];
				$I++;
			}

			return $array;
		}

		# Deletar direto no banco
		protected function deletarClientes($id) {
			$bfetch = $this -> db = $this -> conexaoDB() -> prepare("
				DELETE FROM usuario WHERE id = :id");
			$bfetch -> bindParam(':id', $id, \PDO::PARAM_INT);
			$bfetch -> execute();
		}

		# Atualização direto no banco
		protected function atualizarClientes($id, $nome, $sexo, $cidade) {
			$bfetch = $this -> db = $this -> conexaoDB() -> prepare("
				UPDATE usuario SET
				nome = :nome,
				sexo = :sexo,
				cidade = :cidade
				WHERE id = :id");
			$bfetch -> bindParam(':id', $id, \PDO::PARAM_INT);
			$bfetch -> bindParam(':nome', $nome, \PDO::PARAM_STR);
			$bfetch -> bindParam(':sexo', $sexo, \PDO::PARAM_STR);
			$bfetch -> bindParam(':cidade', $cidade, \PDO::PARAM_STR);
			$bfetch -> execute();
		}
	}