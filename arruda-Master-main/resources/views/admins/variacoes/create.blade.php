@extends('layouts._admin.app')
    @section('content')
        <div class="container">
            <h2 class="center">Adição de Variações</h2>
            <h6 class="center">Ref: {{$registro->referencia}}, Categoria: {{$registro->sub_category}}, Descrição: {{$registro->descricao}}</h6>
            <div class="row #4db6ac teal lighten-2">
                <nav>
                    <div class="nav-wrapper #4db6ac teal lighten-2">
                        <ul class="left hide-on-med-and-down">
                            <li><a href="{{route('home')}}">Início</a></li>
                            <li><a href="{{route('admins.products')}}">Lista de Produtos</a></li>
                            <li><a href="{{route('admins.products.edit',$id)}}">Edição de Produto</a></li>
                            <li><a href="{{ route('admins.variacoes',$id) }}">Lista de Variações</a></li>
                            <li class="active"><a href="{{ route('admins.variacoes.create',$id) }}">Incluindo Variação</a></li>

                        </ul>
                    </div>
                </nav>
            </div>
            @if($errors->any())
                <div class="row col-12 red">
                    <ul class="left hide-on-med-and-down">
                        @if ($errors->all())
                            <li> Opa, parece que algo deu errado. </li>
                        @endif
                    </ul>
                </div>
            @endif
            <form action="{{route('admins.variacoes.store')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
                <input type="hidden" name="produto_id" value="{{$id}}">
                @include('admins.variacoes._form')
            <button class="btn blue">Adicionar</button>
            </form>
        </div>
    @endsection
