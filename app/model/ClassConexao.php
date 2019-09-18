<?php 
	namespace App\Model;

	class ClassConexao {

		# Realiza a conexão com o banco de dados
		public function conexaoDB() {
			try {
				$db = new \PDO("mysql:dbname=".DB.";host=".HOST.";", USER, PASS);
				return $db;
			} catch (PDOException $e) {
				return $err -> getMessage();
			}
		}
	}