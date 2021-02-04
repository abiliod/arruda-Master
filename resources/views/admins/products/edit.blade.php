@extends('layouts._admin.app')
@section('content')
<div class="container">
	<h2 class="center">Edição de Produtos</h2>
    <div class="row #4db6ac teal lighten-2">
        <nav>
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admins.products')}}">Lista de Produtos</a></li>
                    <li class="active"><a href="{{route('admins.products.edit',$id)}}">Edição de Produtos</a></li>
                </ul>
            </div>
        </nav>
    </div>
    @if($errors->any())
        <div class="row col-12 red">
            <ul class="left hide-on-med-and-down">
            @if ( $errors->all() )
                <li> Opa, parece que algo deu errado. </li>
            @endif
             </ul>
        </div>
    @endif
    <form action="{{ route('admins.products.update',$registro->id) }}" method="post"  enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        @include('admins.products._form')
        <button class="btn blue">Atualizar</button>
    </form>
</div>
@endsection
