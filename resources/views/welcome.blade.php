@extends('layouts._site.app')

@section('content')

    @include('layouts._site._navHhasLogin')

    <aside id="colorlib-hero">
        <div class="flexslider">
            <ul class="slides">
{{--  falta              automatizar o slides--}}
                <li style="background-image: url(  {{asset('img/products/DTFT1.jpeg') }} );">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">Mulheres</h1>
                                        <h2 class="head-2">Calçados</h2>
                                        <h2 class="head-3">Coleções</h2>
                                        <p class="category"><span>Tendências</span></p>
                                        <p><a href="#" class="btn btn-primary">Coleção de Fábrica</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li style="background-image: url(  {{asset('img/products/DTFT2.jpeg') }} );">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">Grandes</h1>
                                        <h2 class="head-2">Descontos</h2>
                                        <h2 class="head-3"><strong class="font-weight-bold">50%</strong> Off</h2>
                                        <p class="category"><span>Sandálias em liquidação.</span></p>
                                        <p><a href="#" class="btn btn-primary">Coleção de Fábrica</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

                <li style="background-image: url(  {{asset('img/products/DTFT3.jpg') }} );">
                    <div class="overlay"></div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3 text-center slider-text">
                                <div class="slider-text-inner">
                                    <div class="desc">
                                        <h1 class="head-1">Grandes</h1>
                                        <h2 class="head-2">Descontos</h2>
                                        <h2 class="head-3"><strong class="font-weight-bold">50%</strong> Off</h2>
                                        <p class="category"><span>Sandálias em liquidação.</span></p>
                                        <p><a href="#" class="btn btn-primary">Coleção de Fábrica</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </aside>

    <div class="colorlib-intro">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="intro">
                        Criação de produtos de qualidade e bem projetados que você deseja.
                    </h2>
                </div>
            </div>
        </div>
    </div>

{{--    customizar para mostrar os produtos que vier ser selecionado--}}
    <div class="colorlib-product">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <div class="featured">
                        <a href="#" class="featured-img" style="background-image: url( {{asset('img/products/DTFT4.jpg') }} );"></a>
                        <div class="desc">

                            {{--    customizar para mostrar os produtos que vier ser selecionado--}}
                            <h2><a href="#">Plataforma</a></h2>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 text-center">
                    <div class="featured">
                        <a href="#" class="featured-img" style="background-image: url(images/women.jpg);"></a>
                        <div class="desc">
                            <h2><a href="#">Sandália</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="colorlib-product">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 offset-sm-2 text-center colorlib-heading">
                    <h2>Mais Vendidos</h2>
                </div>
            </div>

            <div class="row row-pb-md">
                <div class="w-100"></div>
                @forelse($registros as $registro)
                    <div class="col-lg-3 mb-4 text-center">
                        <div class="product-entry border">
                            <a href="{{route('product_detail', $registro->id)}}" class="prod-img">
                                <img src="{{asset($registro->imagem_capa)}}" class="img-fluid" alt="Click">
                            </a>
                            <div class="desc">
                                <h2><a href="{{route('product_detail', $registro->id)}}">{{$registro->descricao}}</a></h2>
{{--                                <span class="price">Variações +</span>--}}
                            </div>
                        </div>
                    </div>
                @empty
                                    <h2>   <span class="desc">Não há produtos para exibir.</span></h2>
                @endforelse

            </div>
{{--            ->fim row row-pb-md--}}
            <div class="row">
                <div class="col-md-12 text-center">
                    <p><a href="{{route('/')}}" class="btn btn-primary btn-lg">Todos Produtos</a></p>
                </div>
            </div>
        </div>
    </div>

        @include('layouts._site._parceiros')


    <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>
@endsection
