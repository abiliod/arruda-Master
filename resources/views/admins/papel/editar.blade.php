@extends('layouts._admin.app')
@section('content')
<div class="container">
	<h2 class="center">Editar Papel</h2>

    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admin.papel')}}">Lista de Papéis</a></li>
                    <li class="active"><a href="#">Editar de Papéis</a></li>

                </ul>
            </div>
        </nav>
    </div>


	<div class="row">
		<form action="{{ route('admin.papel.atualizar',$registro->id) }}" method="post">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="put">
		@include('admins.papel._form')
		<button class="btn blue">Atualizar</button>
		</form>
	</div>
</div>
@endsection
