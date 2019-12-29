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
     * Every controller must inherit its parent constructor
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
    }

    /**
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(): void
    {
        $viewFile = "Home.html.twig";
        $viewData = [];

        $this->twig->display($viewFile, $viewData);
    }
}