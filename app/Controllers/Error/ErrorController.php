<?php

namespace App\Controllers\Error;

use App\Controllers\Controller;
use App\Support\Classes\Seo;

/**
 * Class ErrorController
 * @package App\Controllers\Error
 */
class ErrorController extends Controller
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
     * @param array $urlData
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index(array $urlData): void
    {
        $viewFile = "Error/Error.html.twig";
        $viewData = [];

        $viewData["errorCode"] = $urlData["errcode"];

        $viewData["seo"] = $this->seo->optimize(
            "Error | MVC",
            "Ops. There was an error.",
            site()."/ooops/{$urlData["errcode"]}",
            "https://via.placeholder.com/1200x628.png?text=This%20is%20the%20error%20example%20image"
        )->publisher(
            "page",
            "author"
        )->twitterCard(
            "@creator",
            "@site",
            site()
        )->render();

        switch ($urlData["errcode"]) {
            case 400:
                $viewData["errorDesc"] = "Requisição inválida";
                break;
            case 404:
                $viewData["errorDesc"] = "Não encontrado";
                break;
            case 405:
                $viewData["errorDesc"] = "Método não permitido";
                break;
            case 501:
                $viewData["errorDesc"] = "Não implementado";
                break;
            default:
                $viewData["errorDesc"] = "Não foi possível acessar está página";
                break;
        }

        $this->twig->display($viewFile, $viewData);
    }
}