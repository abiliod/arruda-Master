@extends('layouts._site.app')
@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="bread"><span><a href="{{ route('/') }}">Home</a></span> / <span>Contact</span></p>
                </div>
            </div>
        </div>
    </div>


    <div id="colorlib-contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h3>Informações de Contato</h3>
                    <div class="row contact-info-wrap">
                        <div class="col-md-3">
                            <p><span><i class="icon-location"></i></span>
                                <a href="{{ route('sobre') }}">Nossa localização</a>
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-phone3"></i></span> <a href="https://api.whatsapp.com/send?phone=5562999388377"  target="_blank">+55(62)9 9938 8377</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-paperplane"></i></span> <a href="mailto:vendas@arrudacalcados.com.br"  target="_blank">vendas@arrudacalcados.com.br</a></p>
                        </div>
                        <div class="col-md-3">
                            <p><span><i class="icon-globe"></i></span> <a href="{{ route('/') }}">arrudacalcados.com.br</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">

                    <div class="contact-wrap">
                        <h3>Entre com Informações</h3>
                        <form action="{{ route('site.contato.enviar') }}" class="contact-form" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="nmform" value="contact_site">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fname">Primeiro Nome</label>
                                        <input type="text" id="fname" name="fname" class="form-control"
                                               placeholder="Seu primeiro nome">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lname">Segundo Nome</label>
                                        <input type="text" id="lname" name="lname" class="form-control" placeholder="Seu Sobrenome">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" id="email" name="email"  class="form-control" placeholder="Seu melhor endereço de email">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="subject">Assunto</label>
                                        <input type="text" id="subject"  name="subject" class="form-control" placeholder="Assunto objeto da mensagem">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message">Mensagem</label>
                                        <textarea name="message" id="message"  cols="30" rows="10" class="form-control" placeholder="Diga nos aqui sua preocupação"></textarea>
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="submit" value="Enviar Menssagem" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-md-6">
                    @if(isset($pagina->mapa))
                        <div class="video-container">
                            {!! $pagina->mapa !!}
                        </div>

                    @else
                        <img class="responsive-img col-md-auto" src="{{ asset($pagina->imagem) }}">
                    @endif

                </div>
            </div>
        </div>
    </div>
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
    </div>
@endsection
