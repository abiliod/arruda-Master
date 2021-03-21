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
                        <input placeholder="Digite a Categoria,  Referencia ou parte da Descrição." id="search" name="search" type="text" >
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
                        <li class="active"><a href="{{route('admins.products')}}">Lista de Produtos</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <na class="row">
			<table class="bordered">
				<thead>
					<tr>
	     				<th>Categoria</th>
                        <th>Imagem</th>
                        <th>Referência</th>
                        <th>Modelo</th>
                        <th>Coleção</th>
                        <th>Descricao</th>
						<th>Ação</th>
					</tr>
				</thead>
				<tbody>

                @forelse($registros as $registro)
                    <tr>
                        <td>{{ $registro->sub_category}}</td> {{-- modelo_description--}}
                        <td>
                            @if(isset($registro->imagem_capa))
                                <img  width="60" src="{{ asset( $registro->imagem_capa ) }}">
                            @endif
                        </td>
                        <td>{{ $registro->referencia}}</td> {{-- modelo_description--}}
                        <td>{{ $registro->modelo_description}}</td> {{-- modelo_description--}}
                        <td>{{ $registro->colecao_description }}</td>   {{--   colecao_description--}}
                        <td>{{ $registro->descricao }}</td>
                        <td>
                            <a class="btn orange" href="{{ route('admins.products.edit',$registro->id) }}">Editar</a>
                            <a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admins.products.destroy',$registro->id) }}' }">Deletar</a>
                        </td>
                    </tr>

                @empty
                <div class="row">
                    <tr>
                        <td>
                            <a class="btn blue" href="{{route('admins.products.create')}}">Adicionar</a>
                        </td>
                    </tr>
                </div>
                @endforelse
                </tbody>
            </table>

                    <nav class="#26a69a" >
{{--                {!! $registros->render() !!}--}}
                {!! $registros->links() !!}
{{--                 {{ $registros->onEachSide(5)->links() }}--}}
                    </nav>

        </div>
    </div>
@endsection
