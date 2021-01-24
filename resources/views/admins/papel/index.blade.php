@extends('layouts._gynPromo.app')
@section('content')
<div class="container">
	<h2 class="center">Lista de Papéis</h2>
	<div class="row">
		<nav>
			<div class="nav-wrapper green">
				<div class="col s12">
					<a href="{{ route('home')}}" class="breadcrumb">Início</a>
					<a class="breadcrumb">Lista de Papéis</a>
				</div>
			</div>
		</nav>
	</div>
	<div class="row">
		<table>
			<thead>
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				@foreach($registros as $registro)
				<tr>
					<td>{{ $registro->id }}</td>
					<td>{{ $registro->nome }}</td>
					<td>{{ $registro->descricao }}</td>
					<td>

						@can('papel_editar')

						<!-- Desabilita edição de papel para administrador e  Cliente/Fornecedor ----->
                            @if( ($registro->nome != 'admins') and ($registro->nome != 'Cliente/Fornecedor'))
                            <a class="btn orange" href="{{ route('admins.papel.editar',$registro->id) }}">Editar</a>
                            <a class="btn blue" href="{{ route('admins.papel.permissao',$registro->id) }}">Permissão</a>
                            @elseif( ($registro->nome = 'admins') and ($registro->nome = 'Cliente/Fornecedor'))
                            <a class="btn orange disabled" >Editar</a>
                            <a class="btn blue" href="{{ route('admins.papel.permissao',$registro->id) }}">Permissão</a>
                            @else
                            <a class="btn orange disabled" >Editar</a>
                            <a class="btn blue disabled" >Permissão</a>
                            @endif
						@endcan
						@can('papel_deletar')
						@if( ($registro->nome != 'admins') and ($registro->nome != 'Cliente/Fornecedor'))
						<!-- Desabilita exclusão de papel  para administrador  e Cliente/Fornecedor ----->
						<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admins.papel.deletar',$registro->id) }}' }">Deletar</a>
						@else
						<a class="btn red disabled" >Deletar</a>
						@endif
						@endcan
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="row">
		<a class="btn blue" href="{{route('admins.papel.adicionar')}}">Adicionar</a>
	</div>
</div>
@endsection
