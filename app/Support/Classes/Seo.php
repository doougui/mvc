<?php

namespace App\Support\Classes;

use CoffeeCode\Optimizer\Optimizer;

class Seo extends Optimizer
{
    /** @var $optimizer Optimizer */
    protected $optimizer;

    public function __construct(
        string $schema = 'article'
    ) {
        parent::__construct();

        $this->openGraph(
            site("name"),
            "pt_BR",
            $schema
        )->facebook(
          "10101010101010"
        );
    }
}