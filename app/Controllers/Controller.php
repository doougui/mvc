<?php

namespace App\Controllers;

use App\Support\Classes\ClassBreadcrumb;
use Twig\TwigFunction;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

/**
 * Class Controller
 * @package App\Controllers
 */
class Controller
{
    /** @var object */
    private $loader;

    /** @var object */
    protected $twig;

    /**
     * @var
     */
    protected $router;

    /**
     * Controller constructor.
     * @param $router
     */
    protected function __construct($router)
    {
        $this->router = $router;

        /**
         * Set debug to false and uncomment cache line on production
         */
        $this->loader = new FilesystemLoader(dirname(__DIR__, 2)."/views");
        $this->twig = new Environment($this->loader, [
//            "cache" => dirname(__DIR__, 2)."/views/cache",
            "debug" => true
        ]);

        /**
         * This is a debug only function, remove it on production
         */
        $this->twig->addExtension(new DebugExtension());

        $functions = [
            "breadcrumb" => new TwigFunction("breadcrumb", function () {
                return (new ClassBreadcrumb)->addBreadcrumb();
            }),
            "site" => new TwigFunction("site", function (string $param = null)
            {
                return site($param);
            }),
            "asset" => new TwigFunction("asset", function (
                string $path
            ) {
                return asset($path);
            }),
            "flash" => new TwigFunction("flash", function (
                string $type = null,
                string $message = null
            ) {
                return flash($type, $message);
            })
        ];

        foreach ($functions as $function) {
            $this->twig->addFunction($function);
        }
    }
}