@extends('layouts._admin.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Pessoa</h2>
    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admin.pessoas')}}">Lista de Pessoas</a></li>
                    <li class="active"><a>Endereços de  - {{$registro->priName_Razao }}</a></li>
                </ul>
            </div>
        </nav>
    </div>

	<div class="row col s12">
		<label>Linha do Tempo {{ isset($registro->status) ? $registro->status : '0' }}  % completo</label>
		<input  type="range"  min="0" max="10" value="{{ isset($registro->status) ? $registro->status : '' }}" caption="Linha do Tempo"/>
	</div>
    <div class="row col s12">
        <form action="{{route('admin.pessoas.enderecoSalvar')}}" method="post">
        @CSRF
        <input type="hidden" name="pessoa_id" class="validade" value="{{ isset($registro->id) ? $registro->id : '' }} ">
            @include('admins.pessoas._formCreateEndereco')
        <div class="row col s12">
            <button class="btn blue">Salvar</button>
        </div>
    </form>
    </div>
</div>
@endsection
