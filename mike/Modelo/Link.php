<?php

namespace Mike\Modelo;

class Link {

    private $url;

    public function __construct($url) {
        $this->url = $url;
    }

    public function getURL(){
        return $this->url;
    }
}