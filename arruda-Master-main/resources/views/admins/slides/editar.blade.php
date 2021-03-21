@extends('layouts._admin.app')
<!-- 26022020 inclusao da funcionalidade Slide-->
@section('content')
<div class="container">
	<h2 class="center">Editar Slide</h2>
    <div class="row #4db6ac teal lighten-2 ">
        <nav>
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admins.slides')}}">Lista de Slide</a></li>
                    <li class="active"><a href="#">Edição de Slide</a></li>
                </ul>
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
