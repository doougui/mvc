<?php

namespace App\Models;

class Connection
{
    protected $db;

    public function __construct()
    {
        try {
            $this -> db = new \PDO(
                DB_CONFIG['driver'].
                ":dbname=".DB_CONFIG['dbname'].
                ";host=".DB_CONFIG['host'].
                ";port=".DB_CONFIG['port'].
                ";charset=".DB_CONFIG['charset'],
                DB_CONFIG['username'],
                DB_CONFIG['password'],
                DB_CONFIG['options']);
        } catch (PDOException $e) {
            die("Error: {$e -> getMessage()}");
        }
    }
}