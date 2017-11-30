<?php

namespace Mike\Core;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Mike\Modelo\Link;
use Goutte\Client as Web;

class ListaDeLinks{

    private $web;
    private static $listaDeLojas = null;
    private function __construct() {
        $this->web = new Web();
        self::$listaDeLojas = collect();
    }

    public static function listar(){
        return Cache::remember('lista_de_lojas', 60, function(){
            if(empty( self::$listaDeLojas)) {
                $lista = new ListaDeLinks();
                self::$listaDeLojas = collect($lista->realizaProcessamento());
            }
            return self::$listaDeLojas;
        });
    }


    private function realizaProcessamento(){
        $i = 0;
        $listaDeLinks = array();
        do {
            $crawler = $this->enviaRequisicao($i++);
        }while($this->listaLinks($crawler, $listaDeLinks));
        return $listaDeLinks;
    }

    private function enviaRequisicao($offset = 0){
        return $this->web->request(
            'POST',
            'https://famintoo.com/model/select_menus.php',
            ['city_id' => 3278, 'begin' => ($offset*20)+1]
        );
    }

    private function listaLinks($crawler, &$array){
        return $crawler->filter("a.list-menu")->each(function ($node) use (&$array){
            $url = "https://famintoo.com/" . ltrim($node->attr("href"), "./");
            $array[] = new Link($url);
            return $url;
        });

    }


}