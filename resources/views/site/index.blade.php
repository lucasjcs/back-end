@extends('site.layout.layout')
@section('class-header') header-expandido @stop
@section('content')
    <section id="content" class="container listagem-de-conteudo">
        <div class="row">
            @for($i=0;$i<10;$i++)
                <article class="item-box col-sm-12 col-md-6">
                    <a href="/delivery/el-encontro-restaurante">
                        <figure><img src="/img/trash/logo.jpg" srcset="/img/trash/logo@2x.jpg 2x,/img/trash/logo@3x.jpg 3x" class="logo"></figure>
                        <div class="texts">
                            <h3>El Encontro restaurante</h3>
                            <p class="type"><i class="fa fa-cutlery" aria-hidden="true"></i>Comida mexicana</p>
                            <p class="estime-time"><i class="fa fa-clock-o" aria-hidden="true"></i>50 - 60 min</p>
                        </div>
                    </a>
                </article>
            @endfor
        </div>
    </section>
@stop