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
    /** @var $seo Seo */
    private $seo;

    /**
     * Every controller must inherit its parent constructor
     * @param $router
     */
    public function __construct($router)
    {
        parent::__construct($router);
        $this->seo = new Seo();
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

        $viewData["seo"] = $this->seo->optimize(
            "Home | MVC",
            "This is the homepage",
            site(),
            "https://via.placeholder.com/1200x628.png?text=This%20is%20the%20home%20example%20image"
        )->publisher(
            "page",
            "author"
        )->twitterCard(
            "@creator",
            "@site",
            site()
        )->render();

        $this->twig->display($viewFile, $viewData);
    }
}