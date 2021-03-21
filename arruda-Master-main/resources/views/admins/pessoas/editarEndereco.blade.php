@extends('layouts._admin.app')

@section('content')
<div class="container">
    <h2 class="center">Editar Endereços</h2>
    <div class="row">
        <nav>
            <div class="nav-wrapper green">
                <div class="col s12">
                    <a href="{{route('home')}}" class="breadcrumb">Início</a>
                    <a href="{{route('admins.pessoas')}}" class="breadcrumb">Lista de Pessoas</a>
                    <a class="breadcrumb">Editar Pessoa</a>
                    <a class="breadcrumb">Registro de Endereço para {{isset($registro->priName_Razao) ? $registro->priName_Razao : ''}}</a>
                </div>
            </div>
        </nav>
    </div>
    <div class="row col s12">
        <label>Linha do Tempo {{ isset($registro->status) ? $registro->status : '0' }}  % completo</label>
        <input  type="range"  min="0" max="10" value="{{ isset($registro->status) ? $registro->status : '' }}" caption="Linha do Tempo"/>
    </div>

    <form action="{{route('admins.pessoas.atualizaEndereco')}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="put">
    <input type="hidden" name="pessoa_id" value="{{isset($registro->id) ? $registro->id : ''}}">
    <input type="hidden" name="id" value="{{isset($endereco->id) ? $endereco->id : ''}}">

    @include('admins.pessoas._formEditEndereco')

    <div class="row col s12">
        <button class="btn blue">Atualizar</button>
    </div>
    </form>
</div>


@endsection

