<?php

namespace Mike\Core;
use Goutte\Client as Web;
use Illuminate\Support\Facades\Cache;
use Mike\Modelo\ItemCardapio;
use Symfony\Component\DomCrawler\Crawler;

class Cardapio {

    private $web;

    private function __construct() {
        $this->web = new Web();
    }

    public static function captura($url){
        return Cache::remember('cardapio:'.$url, 60, function() use($url) {
            $c = new Cardapio();
            $crawler = $c->web->request("GET", $url);
            $itens = $crawler->filter(".prod")->each(function ($item) {
                $itemCardapio = new ItemCardapio();
                $itemCardapio->nome = $item->attr("pn");
                $itemCardapio->valor = $item->attr("pp");
                $itemCardapio->descricao = $item->attr("pd");
                $itemCardapio->categoria = $item->attr("tn");
                return $itemCardapio;
            });

            return collect($itens);
        });

    }
}