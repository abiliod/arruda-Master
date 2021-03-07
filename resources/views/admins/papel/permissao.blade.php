@extends('layouts._admin.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Permissões para {{$papel->nome}}</h2>

        <div class="row #4db6ac teal lighten-2 ">
            <nav >
                <div class="nav-wrapper #4db6ac teal lighten-2">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('home')}}">Início</a></li>
                        <li><a href="{{route('admin.papel')}}">Lista de Papéis</a></li>
                        <li class="active"><a href="#">Editar de Permissões</a></li>

                    </ul>
                </div>
            </nav>
        </div>
                

		<div class="row">
			<form action="{{route('admin.papel.permissao.salvar',$papel->id)}}" method="post">
			{{ csrf_field() }}
			<div class="input-field">
				<select name="permissao_id">
					@foreach($permissao as $valor)
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

						<th>Permissão</th>
						<th>Descrição</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($papel->permissoes as $value)
					<tr>
						<td>{{ $value->nome }}</td>
						<td>{{ $value->descricao }}</td>

						<td>

							<a class="btn red" href="javascript: if(confirm('Remover essa permissão?')){ window.location.href = '{{ route('admin.papel.permissao.remover',[$papel->id,$value->id]) }}' }">Remover</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>

	</div>

@endsection
