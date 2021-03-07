@extends('layouts._admin.app')
@section('content')
<div class="container">
	<h3 class="center">Cadastro de Pessoa</h3>
	<div class="row">
		<nav>
			<div class="nav-wrapper green">
				<div class="col s12">
					<a href="{{ route('home')}}" class="breadcrumb">Início</a>
					<a href="{{route('admins.pessoas')}}" class="breadcrumb">Lista de Pessoas</a>
					<a class="breadcrumb">Cadastrar Pessoa</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row col s12">
		<label>Linha do Tempo 0 % completo</label>
		<input  type="range"  min="0" max="10" value="0" caption="Linha do Tempo"/>
	</div>

	<div class="row">


		<form class="col s12" action="{{Route('admins.pessoas.addPessoa')}}" method="post">
			@CSRF

			<div class="row col s12">
	            <div class="input-field col m4 s12">
		            <input type="text" id="cpf_cnpj" name="cpf_cnpj" class="validade" placerolder="Entre com o CPF ou CNPJ" value="">
		            <label>CPF/CNPJ</label>

	            </div>
            <div class="input-field col m4 s12">
		        <input type="text" id="priName_Razao" name="priName_Razao" class="validade" placerolder="Entre com o E-mail" value="">
		        <label  for="priName_Razao">Primeiro Nome ou Razão Social</label>
        	</div>

            <div class="input-field col m4 s12">
		        <input type="text" id="email" name="email" class="validade" placerolder="Entre com o E-mail" value="">
		        <label  for="email">E-Mail</label>
        	</div>

			<div class="row col s12">
				<button class="btn blue">Próximo</button>
			</div>
		</form>
	</div>
</div>
@endsection
