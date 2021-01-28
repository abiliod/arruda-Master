@extends('layouts._admin.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Produtos</h2>
            <form action="{{route('admins.products.search')}}" method="post">
                @csrf

                <div class="row">
                    <div class="input-field col s6">
                        <select class="input-field"  name="modelo_description">
                            <option value="" selected >Selecione</option>
                            @foreach($modelos as $modelo)
                                <option value="{{$modelo->id}}">{{ $modelo->modelo_description }}</option>
                            @endforeach
                        </select>
                        <label>Modelos</label>
                    </div>
                    <div class="input-field col s6">
                        <select class="input-field"  name="colecao_description" >
                            <option value="" selected >Selecione</option>
                            @foreach($colecaos as $colecao)
                                <option value="{{$colecao->id}}">{{ $colecao->colecao_description }}</option>
                            @endforeach
                        </select>
                        <label>Coleção</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Digite a Referencia ou parte da Descrição." id="search" name="search" type="text" >
                        <label for="search">Palavras Chave</label>
                    </div>
                    <div class="input-field col  s6">
                        <button class="btn blue">Filtrar</button>
                    </div>
                </div>
            </form>

        <div class="row #4db6ac teal lighten-2 ">
            <nav >
                <div class="nav-wrapper #4db6ac teal lighten-2">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('home')}}">Início</a></li>
                        <li class="active"><a href="#">Lista de Produtos</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
			<table>
				<thead>
					<tr>
	     				<th>id</th>
                        <th>Imagem</th>
                        <th>Referência</th>
                        <th>Modelo</th>
                        <th>Coleção</th>
                        <th>Descricao</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>
				@foreach($registros as $registro)
					<tr>
                        <td>{{ $registro->id}}</td> {{-- modelo_description--}}
						<td>Foto</td>
                        <td>{{ $registro->referencia}}</td> {{-- modelo_description--}}
                        <td>{{ $registro->modelo_description}}</td> {{-- modelo_description--}}
                     <td>{{ $registro->colecao_description }}</td>   {{--   colecao_description--}}
                        <td>{{ $registro->descricao }}</td>
  						<td>
							<a class="btn orange" href="{{ route('admins.products.edit',$registro->id) }}">Editar</a>
							<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admins.products.destroy',$registro->id) }}' }">Deletar</a>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<a class="btn blue" href="{{route('admins.products.create')}}">Adicionar</a>
		</div>



@endsection
