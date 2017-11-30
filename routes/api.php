<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/lojas', function () {
   $lista = \Mike\Core\LojaBuilder::criaListaDeLojas();
   return [
       "lojas"=>$lista
   ];
});
Route::get('/lojas/{id}', function ($id) {
    $lista = \Mike\Core\LojaBuilder::criaListaDeLojas();
    foreach ($lista as $loja){
        if($loja->id == $id){
            $loja->listaDeItens = ($loja->listaDeItens->groupBy(function($item, $key){
                    return $item->categoria;
            }));
            return response()->json($loja);
        }
    }
    return null;
});

Route::get('/produtos', function () {
    return  "";
});