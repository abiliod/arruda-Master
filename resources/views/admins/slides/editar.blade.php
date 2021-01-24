@extends('layouts._gynPromo.app')
<!-- 26022020 inclusao da funcionalidade Slide-->
@section('content')
<div class="container">
	<h2 class="center">Editar Slide</h2>
	<div class="row">
		<nav>
			<div class="nav-wrapper green">
				<div class="col s12">
					<a href="{{ route('home')}}" class="breadcrumb">Início</a>
					<a href="{{route('admins.slides')}}" class="breadcrumb">Lista de Slides</a>
					<a class="breadcrumb">Editar Slide</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<form action="{{ route('admins.slides.atualizar',$registro->id) }}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			<input type="hidden" name="_method" value="put">
			@include('admins.slides._form')
			<button class="btn blue">Atualizar</button>
		</form>
	</div>
</div>
@endsection
