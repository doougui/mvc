<?php

namespace App\Controllers\Blog;

use App\Core\Render;

class PostController extends Render
{
    public function index(array $urlData)
    {
        $viewData = [];
        $dir = "Blog/Post.html.twig";

        $viewData["post"] = [
            "id" => $urlData["post_id"],
            "slug" => $urlData["post_slug"],
            "title" => "Post title",
            "content" => "It's the post content"
        ];

        $this -> loadTwig();
        $this -> twig -> display($dir, $viewData);
    }
}