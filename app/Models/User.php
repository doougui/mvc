<?php

namespace App\Models;

use App\Models\Connection;

class User extends Connection 
{
    public function getUsers() 
    {
        $sql = "SELECT * FROM user";
        $sql = $this -> db -> query($sql);
        $sql -> execute();

        if ($sql -> rowCount() > 0) {
            return $sql -> fetchAll();
        } else {
            return [];
        }
    }
}