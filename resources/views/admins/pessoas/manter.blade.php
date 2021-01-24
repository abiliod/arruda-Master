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
			        <a class="breadcrumb">Pessoa - {{$registro->priName_Razao }}</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row col s12">
		<label>Linha do Tempo {{ isset($registro->status) ? $registro->status : '0' }}  % completo</label>
		<input  type="range"  min="0" max="10" value="{{ isset($registro->status) ? $registro->status : '' }}" caption="Linha do Tempo"/>
	</div>
	<div class="row">
   <form class="col s12" action="{{route('admins.pessoas.atualizaPessoa')}}" method="post" enctype="multipart/form-data"/>
		@CSRF
       <input type="hidden" name="id" value="{{isset($registro->id) ? $registro->id : ''}}">
		<input type="hidden" name="_method" value="put">
        @include('admins.pessoas._formStep4')
		</form>
	</div>
</div>
@endsection
