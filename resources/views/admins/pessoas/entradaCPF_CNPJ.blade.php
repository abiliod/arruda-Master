@extends('layouts._admin.app')
@section('content')
<div class="container">
	<h3 class="center">Editar Dados de - {{$registro->priName_Razao}}</h3>

    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admin.pessoas')}}">Início</a></li>
                    <li class="active"><a href="#">Editar Pessoa</a></li>

                </ul>
            </div>
        </nav>
    </div>

	<div class="row col s12">
		<label>Linha do Tempo {{ isset($registro->status) ? $registro->status : '0' }}  % completo</label>
		<input  type="range"  min="0" max="10" value="{{ isset($registro->status) ? $registro->status : '' }}" caption="Linha do Tempo"/>
	</div>

	<div class="row">


		<form class="col s12" action="{{Route('admin.pessoas.show')}}" method="post">
			@CSRF
				<div class="input-field" class="col s6">
				<input type="hidden" name="id" class="validade" value="{{ isset($registro->id) ? $registro->id : '' }}">
                <input type="hidden" name="tipoPessoa" class="validade" value="{{ isset($registro->tipoPessoa) ? $registro->tipoPessoa : '' }}">

                @if($registro->cpf_cnpj > 1)
                <input type="text" name="cpf_cnpj" class="validade"
                                value="{{ isset($registro->cpf_cnpj) ? $registro->cpf_cnpj : '' }}" readonly>
                @else
                <input type="text" name="cpf_cnpj" class="validade"
                                value="{{ isset($registro->cpf_cnpj) ? $registro->cpf_cnpj : '' }}">
                @endif



				<label>CPF/CNPJ</label>
			</div>
			<div class="row col s12">
				<button class="btn blue">Próximo</button>
			</div>
		</form>
	</div>
</div>
@endsection
