@extends('layouts._admin.app')

@section('content')
	<div class="container">
		<h2 class="center">Lista de Variação</h2>
        <h6 class="center">Ref: {{$registro->referencia}}, Categoria: {{$registro->sub_category}}, Descrição: {{$registro->descricao}}</h6>
            <form action="{{route('admins.variacoes.search')}}" method="post">
                @csrf
                <input type="hidden"  id="produto_id" name="product_id" value="{{$id}}">

                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="CORES ou Tamanho." id="search" name="search" type="text" >
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
                        <li><a href="{{route('admins.products')}}">Lista de Produtos</a></li>
                        <li><a href="{{route('admins.products.edit',$id)}}">Edição de Produto</a></li>
                        <li class="active"><a href="{{ route('admins.variacoes',$id) }}">Lista de Variações</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            @if(! $variacoes->isEmpty())
                <table class="bordered">
                    <thead>
                    <tr>
                        <th>id produto</th>
                        <th>Cores</th>
                        <th>Tamanho</th>
                        <th>Estoque</th>
                        <th>Preço</th>
                        <th>Desconto</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($variacoes as $variacao)
                        <tr>
                            <td>{{ $id}}</td>
                            <td>{{ $variacao->cor}}</td>
                            <td>{{ $variacao->tamanho_br}}</td>
                            <td>{{ $variacao->estoque}}</td>
                            <td>{{ $variacao->preco }}</td>
                            <td>{{ $variacao->desconto }}</td>
                            <td>
                                <a class="btn orange" href="{{ route('admins.variacoes.edit',$variacao->id) }}">Editar</a>
                                <a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admins.variacoes.destroy',$variacao->id) }}' }">Deletar</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
{{--                {!! $registros->render() !!}--}}
{{--                    {!! $variacoes->links() !!}--}}
                      {{ $variacoes->onEachSide(5)->links() }}

            @else
                <p>
                   <span class="h2">Variação não localizada.</span>

                </p>
            @endif

                <p>
                    <a class="btn blue" href="{{route('admins.variacoes.create',$id)}}">Adicionar</a>
                </p>

        </div>
@endsection
