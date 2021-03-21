@extends('layouts._site.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('index') }}">Home</a></span> / <span class="active">About</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container  #fafafa grey lighten-5">
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
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>
@endsection
