@extends('layouts._admin.app')
    @section('content')
    <div class="container">
        <h2 class="center">Lista de Páginas</h2>
        <div class="row #4db6ac teal lighten-2 ">
            <nav >
                <div class="nav-wrapper #4db6ac teal lighten-2">
                    <ul class="left hide-on-med-and-down">
                        <li><a href="{{route('home')}}">Início</a></li>
                        <li class="active"><a href="#">Lista de Páginas</a></li>

                    </ul>
                </div>
            </nav>
        </div>


        <div class="row #e3f2fd blue lighten-5">
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($paginas as $pagina)
                        <tr>
                            <td>{{ $pagina->id }}</td>
                            <td>{{ $pagina->titulo }}</td>
                            <td>{{ $pagina->descricao }}</td>
                            <td>{{ $pagina->tipo }}</td>
                            <td><a class="btn orange" href="{{ route('admins.paginas.editar',$pagina->id) }}">Editar</a></td>
                        </tr>
                    @empty
                        <p>Não existe registros</p>
                    @endforelse


                </tbody>

            </table>

        </div>

    </div>
    @endsection
