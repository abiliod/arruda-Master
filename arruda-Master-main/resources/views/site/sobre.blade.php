@extends('layouts._admin.app')
@section('content')
<div class="container  #fafafa grey lighten-5">
    <div class="row section">
    	<h3 align="center">Sobre</h3>
    	<div class="divider"></div>
    </div>

    @if(!empty(  $pagina->id ))
        <div class="row section #e3f2fd blue lighten-5">
            <div class="col s12 m6">
                @if(isset($pagina->mapa))
                    <div class="video-container">
                        {!! $pagina->mapa !!}
                    </div>
                @else
                    <img class="responsive-img" src="{{ asset($pagina->imagem) }}">
                @endif
            </div>
            <div class="col s12 m6">
                <h4>{{ $pagina->titulo }}</h4>
                <blockquote>
                    {{ $pagina->descricao }}
                </blockquote>
                <p>{{ $pagina->texto }}</p>
            </div>
        </div>
    @else
        <div class="row section #e3f2fd blue lighten-5">
            <div class="col s12 m6">
                @if(isset($pagina->mapa))
                    <div class="video-container">
                        {!! $pagina->mapa !!}
                    </div>
                @else
                    <h4>não há registros</h4>

                @endif
            </div>
            <div class="col s12 m6">

                <blockquote>

                </blockquote>

            </div>
        </div>
    @endif


</div>
@endsection

