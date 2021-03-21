@extends('layouts._admin.app')
@section('content')
<div class="container">
	<h2 class="center">Editar Páginas</h2>
    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admins.paginas')}}">Lista de Páginas</a></li>
                    <li class="active"><a href="#">Editar Página</a></li>
                </ul>
            </div>
        </nav>
    </div>

    <form action="{{ route('admins.paginas.atualizar',$pagina->id) }}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="put">
        @include('admins.paginas._form')
        <button class="btn blue">Atualizar</button>
    </form>

</div>
@endsection
