@extends('layouts._admin.app')
@section('content')
<div class="container">
	<h2 class="center">Editar Pessoa</h2>

    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li><a href="{{route('admin.pessoas')}}">Lista de Pessoas</a></li>

                    <li class="active"><a>Pessoa - {{$registro->priName_Razao }}</a></li>

                </ul>
            </div>
        </nav>
    </div>





	<div class="row col s12">
		<label>Linha do Tempo {{ isset($registro->status) ? $registro->status : '0' }}  % completo</label>
		<input  type="range"  min="0" max="10" value="{{ isset($registro->status) ? $registro->status : '' }}" caption ="Linha do Tempo"/>
	</div>
	<div class="row">
   <form class="col s12" action="{{route('admin.pessoas.atualizaPessoa')}}" method="post" enctype="multipart/form-data"/>
		@CSRF
       <input type="hidden" name="id" value="{{isset($registro->id) ? $registro->id : ''}}">
		<input type="hidden" name="_method" value="put">
        @include('admins.pessoas._formStep4')
		</form>
	</div>
</div>
@endsection
