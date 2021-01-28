@extends('layouts._admin.app')
    @section('content')
        <div class="container">
            <h2 class="center">Adição de Productos</h2>
            <div class="row #4db6ac teal lighten-2">
                <nav>
                    <div class="nav-wrapper #4db6ac teal lighten-2">
                        <ul class="left hide-on-med-and-down">
                            <li><a href="{{route('home')}}">Início</a></li>
                            <li><a href="{{route('admins.products')}}">Lista de Produtos</a></li>
                            <li class="active"><a href="#">Adição de Produtos</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <form action="{{ route('admins.products.store') }}" method="post">
            {{csrf_field()}}
                @include('admins.products._form')
            <button class="btn blue">Adicionar</button>
            </form>
        </div>
    @endsection
