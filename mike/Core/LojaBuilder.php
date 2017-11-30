<?php

namespace Mike\Core;

use Goutte\Client as Web;
use Illuminate\Support\Facades\Cache;
use Mike\Modelo\ItemCardapio;
use Mike\Modelo\Loja;
use Symfony\Component\DomCrawler\Crawler;

class LojaBuilder {

    private $web;
    private $loja;
    private $crawler = null;

    private function __construct() {
        $this->web = new Web();
        $this->loja = new Loja();
    }

    public static function criaListaDeLojas(){
        return Cache::rememberForever('lista_de_lojas_pronto', function (){
            $lojas = array();
            $i = 1;
            foreach (ListaDeLinks::listar() as $item) {
                $result = self::captura($item->getURL());
                if (!empty($result)) {
                    $result->id = $i++;
                    $lojas[] = $result;
                }

            }
            return $lojas;
        });
    }

    protected static function captura($url){
        return Cache::remember('loja:'.$url, 60, function () use($url) {
            $builder = new LojaBuilder();
            $builder->setCrawler($url);
            $builder->setaDadosBasicos();
            $builder->setaItensDoCardapio();
            if($builder->loja->listaDeItens->isEmpty()){
                return null;
            }
            return $builder->loja;
        });
    }

    private function setCrawler($url){
        $this->crawler = $this->web->request("GET", $url);
    }

    /**
     * @return Crawler
     */
    private function getCrawler(){
        return $this->crawler;
    }

    private function setaDadosBasicos(){
        $this->loja->nome = trim($this->getCrawler()->filter(".menu-title")->text());
        $this->loja->imagem = "https://famintoo.com/".ltrim($this->getCrawler()->filter(".wi-100.pa-10 .bo-le img")->first()->attr("src"), "./");
        $this->loja->tipo = trim(explode(":", $this->getCrawler()->filter("p[itemprop='servesCuisine']")->first()->text())[0]);
        $telefone = $this->getCrawler()->filter("span[itemprop='telephone']");
        if($telefone->count() > 0) {
            $this->loja->telefone = $telefone->first()->text();
        }
    }

    private function setaItensDoCardapio(){
        $itens = $this->getCrawler()->filter(".prod")->each(function ($item) {
            $itemCardapio = new ItemCardapio();
            $itemCardapio->nome = $item->attr("pn");
            $itemCardapio->valor =  str_replace(",", ".", $item->attr("pp"));
            $itemCardapio->descricao = $item->attr("pd");
            $itemCardapio->categoria = $item->attr("tn");
            return $itemCardapio;
        });
        $this->loja->listaDeItens = collect($itens);
    }
}