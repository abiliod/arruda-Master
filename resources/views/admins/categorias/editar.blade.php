@extends('layouts.app')

@section('content')
<div class="container">
	<h2 class="center">Editar Categorias</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('admins.home')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admins.categorias')}}" class="breadcrumb">Lista de Categorias</a>
			        <a class="breadcrumb">Editar Categorias</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admins.categorias.atualizar',$registro->id) }}" method="post">

		{{csrf_field()}}
		<input type="hidden" name="_method" value="put">
		@include('admins.categorias._form')

		<button class="btn blue">Atualizar</button>


		</form>

	</div>

</div>


@endsection
