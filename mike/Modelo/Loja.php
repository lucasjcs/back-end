<?php
namespace Mike\Modelo;


use Illuminate\Support\Collection;

class Loja {

    public $id;
    public $nome;
    public $imagem;
    public $telefone;
    public $tipo;
    /**
     * @var $listaDeItens Collection
     */
    public $listaDeItens;
}