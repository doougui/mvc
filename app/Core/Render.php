<?php

namespace App\Core;

use Src\Classes\ClassBreadcrumb;

class Render
{
    /** @var object */
    private $loader;

    /** @var object */
    protected $twig;

    /**
     * Load twig template engine
     */
    protected function loadTwig(): void
    {
        $this->loader = new \Twig_Loader_Filesystem(DIRREQ."app/views/");
        $this->twig = new \Twig_Environment($this->loader, [
            "cache" => DIRREQ."resources/views/cache"
        ]);

        $breadcrumb = new \Twig_SimpleFunction("breadcrumb", function() {
            echo (new ClassBreadcrumb)->addBreadcrumb();
        });

        $this->twig->addFunction($breadcrumb);
        $this->twig->addGlobal("DIRPAGE", DIRPAGE);
        $this->twig->addGlobal("DIRREQ", DIRREQ);
        $this->twig->addGlobal("DIRIMG", DIRIMG);
        $this->twig->addGlobal("DIRCSS", DIRCSS);
        $this->twig->addGlobal("DIRJS", DIRJS);
        $this->twig->addGlobal("DIRVID", DIRVID);
        $this->twig->addGlobal("DIRAUD", DIRAUD);
        $this->twig->addGlobal("DIRFONT", DIRFONT);
        $this->twig->addGlobal("DIRDESIGN", DIRDESIGN);
    }
}