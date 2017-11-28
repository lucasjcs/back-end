@extends('site.layout.layout')
@section('content')
    <section class="container-fluid" id="company">
        <header class="container">
            <div class="row">
                <div class="col-sm-12">
                   <img src="/img/trash/logo.jpg" srcset="/img/trash/logo@2x.jpg 2x,/img/trash/logo@3x.jpg 3x" class="logo" />
                    <div class="text">
                        <h1>El Encontro music restaurante</h1>
                        <div class="row">
                            <p class="col-lg-6"><i class="fa fa-cutlery" aria-hidden="true"></i>Comida mexicana</p>
                            <p class="col-lg-6"><i class="fa fa-clock-o" aria-hidden="true"></i>50 - 60 min</p>
                            <p class="col-lg-6 cell"><i class="fa fa-phone" aria-hidden="true"></i>(16) 3703 3789</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </section>

    <section id="cardapio" class="container">
        <h2>Cardápio</h2>
        <div class="row">
            <div class="col-sm-12 col-lg-8">
                @for($i=0;$i<15;$i++)
                    <article class="item">
                        <div class="info">
                            <h3>Guacamole</h3>
                            <p>Tomates médios, pimenta folhas de 1/2 coentro, abacate médio, limão, cebola, 100g tortilla</p>
                        </div>
                        <div class="valor-text">
                            <h4>valor</h4>
                            <h5>R$32,00</h5>
                        </div>
                    </article>
                @endfor
            </div>

            <div class="col-sm-12 col-lg-4">
                <div id="sidebar">
                    <h2>Carrinho</h2>
                    <ul>
                        @for($i=0;$i<10;$i++)
                            <li class="item-carrinho"><span class="text"><button class="remover"><i class="fa fa-times-circle" aria-hidden="true"></i></button>1 Guacamole</span><span class="price">R$32,00</span></li>
                        @endfor
                        <li class="taxa-entrega"><span class="text">Taxa de entrega</span><span class="price">R$32,00</span></li>
                        <li class="total-pedido"><span class="text">Total</span><span class="price">R$32,00</span></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>
@stop