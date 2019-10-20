<?php

namespace Src\Classes;

class ClassBreadcrumb 
{
    use \Src\Traits\TraitUrlParser;

    // Create breadbrumbs
    public function addBreadcrumb(
        string $separator = ' &raquo; ', 
        string $home = 'Home'
    ): string {
        $path = $this -> parseUrl(); 
        $currentHref = DIRPAGE; 
        
        $breadcrumbs = ["<a href='{$currentHref}'>{$home}</a>"];

        $pathkeys = array_keys($path); 
        $last = end($pathkeys);

        foreach ($path as $key => $crumb) {
            $title = ucwords(str_replace(['.php', '_', '-'],['', ' ', ' '], $crumb));
            
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