<?php 
	namespace App\Models;

	class Connection {
		protected $db;

		public function __construct() {
			global $config;

			try {
				$this -> db = new \PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=utf8mb4", $config['dbuser'], $config['dbpass']);
				$this -> db -> setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				exit("Error: ".$e -> getMessage());
			}
		}
	}