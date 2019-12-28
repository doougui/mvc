<?php

namespace App\Support\Classes;

use App\Support\Traits\TraitUrlParser;

class ClassBreadcrumb
{
    use TraitUrlParser;

    /**
     *
     * @param string $separator
     * @param string $home
     * @return string
     */
    public function addBreadcrumb(
        string $separator = " &raquo; ",
        string $home = "Home"
    ): string {
        $path = $this->parseUrl();
        $currentHref = SITE["base"]."/";
        
        $breadcrumbs = ["<a href='{$currentHref}'>{$home}</a>"];

        $pathkeys = array_keys($path); 
        $last = end($pathkeys);

        foreach ($path as $key => $crumb) {
            $title = ucwords(str_replace([".php", "_", "-"],["", " ", " "], $crumb));
            
        if (!empty($title)) {
            $currentHref .= "{$crumb}/";
            
            if ($key != $last) {
                $breadcrumbs[] = "<a href='{$currentHref}'>{$title}</a>";
            } else {
                    $breadcrumbs[] = $title;
                }
            }
        }

        return implode($separator, $breadcrumbs);
    }
}