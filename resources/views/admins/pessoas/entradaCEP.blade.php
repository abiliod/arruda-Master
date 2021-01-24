@extends('layouts._gynPromo.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Pessoa</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('home')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admins.pessoas')}}" class="breadcrumb">Lista de Pessoas</a>
			        <a class="breadcrumb">Editar Pessoa</a>
                    <a class="breadcrumb">Endereço</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row col s12">
		<label>Linha do Tempo {{ isset($registro->status) ? $registro->status : '0' }}  % completo</label>
		<input  type="range"  min="0" max="10" value="{{ isset($registro->status) ? $registro->status : '' }}" caption="Linha do Tempo"/>
	</div>

    <form action="{{route('admins.pessoas.enderecoSalvar')}}" method="post">
    @CSRF
    <input type="hidden" name="pessoa_id" class="validade" value="{{ isset($registro->id) ? $registro->id : '' }} ">

        @include('admins.pessoas._formCreateEndereco')

    <div class="row col s12">
    <button class="btn blue">Salvar</button>
    </div>
 </form>
</div>


@endsection
