<div class="row col s12">
	<div class="input-field col m6 s12">
		<input type="text" id="cpf_cnpj" name="cpf_cnpj" class="validade"
        value="{{ isset($registro->cpf_cnpj) ? $registro->cpf_cnpj : '' }}" readonly>
		@if ($registro->tipoPessoa=='Juridica')
		<label>CNPJ</label>
		@elseif ($registro->tipoPessoa=='Fisica')
		<label>CPF</label>
		@else
		<label>CPF/CNPJ</label>
		@endif
	</div>
    <div class="input-field col m6 s12">
		<input type="text" id="email" name="email" class="validade" value="{{ isset($registro->email) ? $registro->email : '' }}" readonly>
		<label  for="email">E-Mail</label>

	</div>
</div>

<div class="row col s12">
	<div class="input-field col s6">
		<i class="material-icons prefix">account_circle</i>
		<input  type="text" id="priName_Razao" name="priName_Razao" style="text-transform: uppercase" class="validate"  value="{{ isset($registro->priName_Razao) ? $registro->priName_Razao : '' }}">
		@if ($registro->tipoPessoa=='Juridica')
		<label for="priName_Razao">Razão Social</label>
		@elseif ($registro->tipoPessoa=='Fisica')
		<label for="priName_Razao">Primeiro Nome</label>
		@else
		<label for="priName_Razao">Primeiro Nome/Razao Social</label>
		@endif
	</div>

	<div class="input-field col s6">
		<i class="material-icons prefix">account_circle</i>
		<input type="text" id="lastName_Fantasia" name="lastName_Fantasia" style="text-transform: uppercase" class="validate"  value="{{ isset($registro->lastName_Fantasia) ? $registro->lastName_Fantasia : '' }}">
		@if ($registro->tipoPessoa=='Juridica')
		<label  for="lastName_Fantasia">Nome Fantasia</label>
		@elseif ($registro->tipoPessoa=='Fisica')
		<label  for="lastName_Fantasia">Segundo Nome</label>
		@else
		<label  for="lastName_Fantasia">Segundo Nome/Fantasia</label>
		@endif
	</div>
</div>

<div class="row col s12">
	<div class="input-field col s4">
		<input type="text" name="identidade_inscricaoEstadual" style="text-transform: uppercase" class="validate"  value="{{ isset($registro->identidade_inscricaoEstadual) ? $registro->identidade_inscricaoEstadual : '' }}">
		@if ($registro->tipoPessoa=='Juridica')
		<label>Inscrição Estadual</label>
		@elseif ($registro->tipoPessoa=='Fisica')
		<label>RG Identidade</label>
		@else
		<label>Identidade/Inscrição Estaduala</label>
		@endif
	</div>

	<div class="input-field col s4">
		<input type="text" class="date" id="campoData" name="data_nasc_Fundacao"
               value="{{ isset($registro->data_nasc_Fundacao)
               ?  date( 'd/m/Y' , strtotime($registro->data_nasc_Fundacao)) : '' }} "
               onkeypress="$(this).mask('00/00/0000')">

        @if ($registro->tipoPessoa=='Juridica')
		<label class="active">Data Fundação</label>
		@elseif ($registro->tipoPessoa=='Fisica')
		<label class="active">Data de Nascimento</label>
		@else
		<label class="active">Data de Nascimento ou Fundação</label>
		@endif
	</div>

    @if ($registro->tipoPessoa=='Fisica')
        <div class="input-field col-sm-4">
            <select name="sexo" id="sexo">
                @if (! old('genero'))
                    <option value="" {{(isset($registro->sexo) && $registro->sexo == ''  ? 'selected' : '')}}>Selecione</option>
                @else
                    <option value="{{old('genero')}}" selected="selected" >{{ old('genero') }}</option>
                @endif

                <option value="Feminino" {{(isset($registro->sexo) && $registro->sexo == 'Feminino'  ? 'selected' : '')}}>Feminino</option>
                <option value="Masculino" {{(isset($registro->sexo) && $registro->sexo == 'Masculino'  ? 'selected' : '')}}>Masculino</option>
                <option value="Unissex" {{(isset($registro->sexo) && $registro->sexo == 'PrefiroNãoResponder'  ? 'selected' : '')}}>Prefiro Não Responder</option>
            </select>
            <label for="genero"  class="@if ($errors->has('sexo')) text-danger @endif">
                @if ($errors->has('sexo')) {{ $errors->first('sexo') }}
                @else Gênero @endif</label>
        </div>
    @endif

</div>

<div class="row col s12">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
			<span>Imagem</span>
			<input type="file" name="imagem">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validade">
		</div>
	</div>
	<div class="col m6 s12">
		@if(isset($registro->imagem))
		<img width="120" src="{{ asset($registro->imagem) }}">
		@endif
	</div>
</div>

<div class="row col s12">
	<button class="btn blue">Atualizar Pessoa</button>
</div>
<div class="row col m12 s12">
    @if($enderecos->count())
	     <h3 class="center">Endereço(s) de {{$registro->priName_Razao}} </h3>
    @endif
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Tipo</th>

				<th>CEP/Cidade/Estado</th>
				<th>Endereço</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
        @if($enderecos->count())
            @foreach($enderecos as $endereco)
            <tr>
				<td>{{ $endereco->id }}</td>
				<td>{{ $endereco->tipo }}</td>
				<td>{{ $endereco->cep }} {{ $endereco->cidade}} {{ $endereco->estado }}</td>
				<td>{{ $endereco->logradouro }}, {{ $endereco->numero}}, {{$endereco->complemento }}</td>
				<td>
					<a class="btn-flat orange"  href="{{ route('admin.pessoas.editarEndereco',$endereco->id) }}">Editar</a>
					<a class="btn-flat red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{ route('admin.pessoas.deletarEndereco',$endereco->id) }}' }">Deletar</a>
				</td>
			</tr>
            @endforeach
        @else
            <tr>
				<h3 class="center">Não há Endereço(s) para {{$registro->priName_Razao}} </h3>
			</tr>
        @endif
		</tbody>
	</table>
</div>

@if($enderecos->count() == 3)
    <div class="row">
       <a class="btn-flat blue"  href="{{ route('admin.pessoas.entradaCEP',$registro->id) }}" disabled>Adicionar Endereço</a>
    </div>
@endif
@if($enderecos->count() <> 3)
    <div class="row">
        <a class="btn-flat blue"  href="{{ route('admin.pessoas.entradaCEP',$registro->id) }}">Adicionar Endereço</a>
    </div>
@endif

