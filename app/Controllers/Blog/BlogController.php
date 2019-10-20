<?php

namespace App\Controllers\Blog;

use App\Controllers\Render;

class BlogController extends Render 
{
    public function index() 
    {
        $viewData = [];
        $dir = "Blog/Blog.html.twig";

        $viewData["articles"] = ["Article 1", "Article 2", "Article 3"];

        $this -> loadTwig();
        $this -> twig -> display($dir, $viewData);
    }
}