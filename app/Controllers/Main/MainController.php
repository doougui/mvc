<?php

namespace App\Controllers\Main;

use App\Core\Render;
use App\Models\User;

class MainController extends Render
{
    public function index()
    {
        $viewData = [];
        $dir = "Main/Main.html.twig";

        $user = new User();

        $viewData['users'] = $user -> getUsers();

        $this -> loadTwig();
        $this -> twig -> display($dir, $viewData);
    }
}