@extends('layouts._gynPromo.app')
@section('content')
<div class="container">
	<h2 class="center">Editar Papel</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('home')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admins.papel')}}" class="breadcrumb">Lista de Papéis</a>
			        <a class="breadcrumb">Editar Papel</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admins.papel.atualizar',$registro->id) }}" method="post">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="put">
		@include('admins.papel._form')
		<button class="btn blue">Atualizar</button>
		</form>
	</div>
</div>
@endsection
