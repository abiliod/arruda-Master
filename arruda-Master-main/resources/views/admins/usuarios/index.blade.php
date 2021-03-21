@extends('layouts._admin.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Usuários</h2>


        <div class="row">
            <div class="nav-wrapper  ">
                <form action="{{route('admin.usuarios.search')}}" method="post">
                    @csrf
                    <div class="input-field col s8">
                        <input id="search" type="search"  name="search"  value="">
                        <label class="label-icon" for="search">
                            <i class="material-icons">search</i>Parte do Nome</label>
                        <i class="material-icons">close</i>
                    </div>
                    <div class="input-field col s2">
                        <button class="btn blue">Filtrar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row #4db6ac teal lighten-2 ">
            <nav >
                <div class="nav-wrapper #4db6ac teal lighten-2">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('home')}}">Início</a></li>
                        <li class="active"><a href="#">Lista de Usuários</a></li>

                    </ul>
                </div>
            </nav>
        </div>

		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
                        <th>Nome</th>
						<th>E-mail</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
						<td>{{ $usuario->email }}</td>
						<td>
							@can('usuario_editar')
							<a class="btn orange" href="{{ route('admin.usuarios.editar',$usuario->id) }}">Editar</a>
							<a class="btn blue" href="{{ route('admin.usuarios.papel',$usuario->id) }}">Papel</a>
                            @endcan
							@can('usuario_deletar')
							<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.usuarios.deletar',$usuario->id) }}' }">Deletar</a>

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
			<a class="btn blue" href="{{route('admin.usuarios.adicionar')}}">Adicionar</a>
		</div>

	</div>

@endsection
