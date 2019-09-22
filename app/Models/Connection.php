<?php 
	namespace App\Models;

	class Connection() {
		protected $db;

		public function __construct() {
			try {
				$this -> db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
				$this -> db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				exit("Error: ".$e -> getMessage());
			}
		}
	}