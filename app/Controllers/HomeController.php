<?php

namespace App\Controllers;

use App\Core\Render;
use App\Models\Access;

/**
 * Class HomeController
 *
 * @author Author Name
 */
class HomeController extends Render
{
    /**
     * HomeController constructor.
     * 
     * @param $router
     */
    public function __construct($router)
    {
        $this->router = $router;
    }

    /**
     * Display home page view
     */
    public function index(): void
    {
        $viewFile = "Home.html.twig";
        $viewData = [];

        $this->loadTwig();
        $this->twig->display($viewFile, $viewData);
    }
}