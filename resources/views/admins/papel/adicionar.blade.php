@extends('layouts._admin.app')

@section('content')
<div class="container">
	<h2 class="center">Adicionar Papel</h2>
	<div class="row">
	 	<nav>
		    <div class="nav-wrapper green">
		      	<div class="col s12">
			        <a href="{{ route('home')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admins.papel')}}" class="breadcrumb">Lista de Papéis</a>
			        <a class="breadcrumb">Adicionar Papel</a>
		      	</div>
		    </div>
	  	</nav>
	</div>
	<div class="row">
		<form action="{{ route('admins.papel.salvar') }}" method="post">

		{{csrf_field()}}
		@include('admins.papel._form')

		<button class="btn blue">Adicionar</button>


		</form>

	</div>

</div>


@endsection
