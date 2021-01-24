@extends('layouts._gynPromo.app')

@section('content')
<div class="container">
	<h2 class="center">Lista de Pessoas</h2>
	<div class="row">
		<nav>
            @can('pessoa_adicionar')
			<div class="nav-wrapper">
				<form action="{{route('admins.pessoas.search')}}" method="post">
					@csrf
					<div class="input-field">
						<input id="search" type="search"  name="search" min(4) required autofocus>
						<label class="label-icon" for="search"><i class="material-icons">search</i></label>
						<i class="material-icons">close</i>
					</div>
				</form>
			</div>
            @endcan

			<div class="row">
			</div>
			<div class="nav-wrapper green">
				<div class="col s12">
					<a href="{{ route('home')}}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Lista de Pessoas</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>CPF/CNPJ</th>
                        <th>E-Mail</th>
                        <th>Nome/Razao</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
						<td>{{ $registro->id }}</td>
						<td>{{ $registro->cpf_cnpj }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->priName_Razao }}</td>
						<td>
                            @can('pessoa_editar')
                            <a class="waves-effect waves-light btn orange" href="{{ route('admins.pessoas.entradaCPF_CNPJ',$registro->id,$registro->cpf_cnpj)}}">Manter</a>
                            @endcan

                            @can('pessoa_deletar')
                            <a class="waves-effect waves-light btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admins.pessoas.deletar',$registro->id) }}' }">Deletar</a>
                            @endcan
                        </td>
					</tr>
				@endforeach
				</tbody>
			</table>

            <div class="row">
			     {!! $registros->links() !!}
            </div>

		</div>
        @can('pessoa_adicionar')
		<div class="row">
			<a class="btn blue" href="{{route('admins.pessoas.adicionarPessoa')}}">Adicionar</a>
		</div>
        @endcan
	</div>

@endsection
