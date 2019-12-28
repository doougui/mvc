<?php

namespace App\Support\Traits;

/**
 * Trait TraitUrlParser
 *
 * @author Author Name
 */
trait TraitUrlParser 
{
    /**
     * @return array
     */
    public function parseUrl(): array 
    {
        $url = "/";

        if (isset($_GET["route"])) {
            $url .= $_GET["route"];
        }
        
        $url = array_values(array_filter(explode("/", $url)));

        return $url;
    }
}