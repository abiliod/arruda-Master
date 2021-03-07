@extends('layouts._admin.app')
@section('content')
	<div class="container">
		<h2 class="center">Lista de Papéis para {{$usuario->name}}</h2>

        <div class="row #4db6ac teal lighten-2 ">
            <nav >
                <div class="nav-wrapper #4db6ac teal lighten-2">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('home')}}">Início</a></li>
                        <li><a href="{{ route('admin.usuarios')}}" >Lista de Usuários</a></li>
                        <li><a>Lista de Papéis</a></li>
                    </ul>
                </div>
            </nav>
        </div>


		<div class="row">
			<form action="{{route('admin.usuarios.papel.salvar',$usuario->id)}}" method="post">
			@CSRF
			<div class="input-field">
				<select name="papel_id">
					@foreach($papel as $valor)
					<option value="{{$valor->id}}">{{$valor->nome}}</option>
					@endforeach
				</select>
			</div>
				<button class="btn blue">Adicionar</button>
			</form>
		</div>
		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Papel</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
			    @foreach($usuario->papeis as $papel)
					<tr>
						<td>{{ $papel->nome }}</td>
						<td>{{ $papel->descricao }}</td>
						<td>
							<a class="btn red" href="javascript: if(confirm('Remover esse papel?')){ window.location.href = '{{ route('admin.usuarios.papel.remover',[$usuario->id,$papel->id]) }}' }">Remover</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
