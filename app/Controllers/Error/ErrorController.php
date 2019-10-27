<?php

namespace App\Controllers\Error;

use App\Core\Render;

class ErrorController extends Render
{
    public function index(array $urlData)
    {
        $viewData = [];
        $dir = "Error/Error.html.twig";

        $viewData["errorCode"] = $urlData["errcode"];

        switch ($urlData['errcode']) {
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

        $this -> loadTwig();
        $this -> twig -> display($dir, $viewData);
    }
}