@extends('layouts._gynPromo.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Usuários</h2>
        <div class="row">
            <div class="nav-wrapper green">
                <form action="{{route('admins.usuarios.search')}}" method="post">
                    @csrf


                    <div class="input-field col s8">
                        <input id="search" type="search"  name="search"  value="">
                        <label class="label-icon" for="search">
                            <i class="material-icons">search</i>Lotação, Matricula ou parte do Nome</label>
                        <i class="material-icons">close</i>
                    </div>

                    <div class="input-field col s2">
                        <button class="btn blue">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>
		<div class="row">
		 	<nav>
			    <div class="nav-wrapper green">
			      	<div class="col s12">
				        <a href="{{ route('home')}}" class="breadcrumb">Início</a>
				        <a class="breadcrumb">Lista de Usuários</a>
			      	</div>
			    </div>
		  	</nav>
		</div>


		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
                        <th>Localização</th>
						<th>Matricula</th>
                        <th>Nome</th>
						<th>E-mail</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->businessUnit }}</td>
						<td>{{ $usuario->document }}</td>
                        <td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>
							@can('usuario_editar')
							<a class="btn orange" href="{{ route('admins.usuarios.editar',$usuario->id) }}">Editar</a>
							<a class="btn blue" href="{{ route('admins.usuarios.papel',$usuario->id) }}">Papel</a>
                            @endcan
							@can('usuario_deletar')
							<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admins.usuarios.deletar',$usuario->id) }}' }">Deletar</a>

							@endcan
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>

		</div>
        <div class="row">
            {!! $usuarios->links() !!}
        </div>

		<div class="row">
			<a class="btn blue" href="{{route('admins.usuarios.adicionar')}}">Adicionar</a>
		</div>

	</div>

@endsection
