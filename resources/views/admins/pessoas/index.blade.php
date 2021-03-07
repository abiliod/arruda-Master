@extends('layouts._admin.app')

@section('content')
<div class="container">
	<h2 class="center">Lista de Pessoas</h2>



    @can('pessoa_adicionar')
{{--        <div class="row">--}}
            <div class="nav-wrapper col s6">
                <form action="{{route('admin.pessoas.search')}}" method="post">
                    @csrf
                    <div class="input-field">
                        <input id="search" type="search"  name="search"  value="">
                        <label class="label-icon" for="search">
                            <i class="material-icons">search</i>Parte do Nome/Razão ou CPF/CNPJ</label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="input-field col s2">
                        <button class="btn blue">Filtrar</button>
                    </div>
                </form>
            </div>
{{--        </div>--}}
    @endcan

    <div class="row #4db6ac teal lighten-2 ">
        <nav >
            <div class="nav-wrapper #4db6ac teal lighten-2">
                <ul class="left hide-on-med-and-down">
                    <li><a href="{{route('home')}}">Início</a></li>
                    <li class="active"><a href="#">Lista de Pessoas</a></li>

                </ul>
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
                            <a class="waves-effect waves-light btn orange" href="{{ route('admin.pessoas.entradaCPF_CNPJ',$registro->id)}}">Manter</a>
                            @endcan

                            @can('pessoa_deletar')
                            <a class="waves-effect waves-light btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.pessoas.deletar',$registro->id) }}' }">Deletar</a>
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
			<a class="btn blue" href="{{route('admin.pessoas.adicionarPessoa')}}">Adicionar</a>
		</div>
        @endcan
	</div>

@endsection
