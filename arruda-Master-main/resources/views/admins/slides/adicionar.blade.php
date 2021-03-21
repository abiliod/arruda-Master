@extends('layouts._admin.app')
<!-- 26022020 inclusao da funcionalidade Slide-->
@section('content')
<div class="container">
	<h2 class="center">Adição Slide</h2>

    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admins.slides')}}">Lista de Slide</a></li>
                    <li class="active"><a href="#">Adição de Slide</a></li>

                </ul>
            </div>
        </nav>
    </div>

	<div class="row"> 	</div>
		<form action="{{ route('admins.slides.salvar') }}" method="post" enctype="multipart/form-data">
			{{csrf_field()}}
			@include('admins.slides._form')
			<button class="btn blue">Adicionar</button>
		</form>

</div>
@endsection
