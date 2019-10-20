<?php

namespace App\Controllers;

class Render
{
    // Properties
    private $loader;
    protected $twig;

    protected function loadTwig()
    {
        $this -> loader = new \Twig_Loader_Filesystem(DIRREQ."app/Views/");
        $this -> twig = new \Twig_Environment($this -> loader, [
            // 'cache' => DIRREQ."app/Views/cache"
        ]);

        $this -> twig -> addGlobal("DIRPAGE", DIRPAGE);
        $this -> twig -> addGlobal("DIRREQ", DIRREQ);
        $this -> twig -> addGlobal("DIRCSS", DIRPAGE."public/css/");
        $this -> twig -> addGlobal("DIRJS", DIRPAGE."public/js/");
        $this -> twig -> addGlobal("DIRVID", DIRPAGE."public/video/");
        $this -> twig -> addGlobal("DIRAUD", DIRPAGE."public/audio/");
        $this -> twig -> addGlobal("DIRFONT", DIRPAGE."public/font/");
        $this -> twig -> addGlobal("DIRDESIGN", DIRPAGE."public/design/");
    }
}