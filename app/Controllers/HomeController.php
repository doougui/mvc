<?php

namespace App\Controllers;

use App\Support\Classes\Seo;

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

        if (
            empty($_SESSION["user"])
            || !$this->user = (new User)->findById($_SESSION["user"])
        ) {
            unset($_SESSION["user"]);
            flash("error", "Acesso negado. Por favor, logue-se.");
            $this->router->redirect("login");
        }
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