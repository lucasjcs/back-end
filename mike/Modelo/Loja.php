<?php
namespace Mike\Modelo;


use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Loja extends Model{
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