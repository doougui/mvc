<?php

namespace App\Controllers;

/**
 * Class HomeController
 *
 * @author Author Name
 */
class HomeController extends Controller
{
    /**
     * HomeController constructor.
     * 
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct();
        $this->router = $router;
    }

    /**
     * Display home page view
     */
    public function index(): void
    {
        $viewFile = "Home.html.twig";
        $viewData = [];

        $this->twig->display($viewFile, $viewData);
    }
}