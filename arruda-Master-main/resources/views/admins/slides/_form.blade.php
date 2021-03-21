@if(isset($registro->imagem))
<!-- 26022020 inclusao da funcionalidade Slide-->
<div class="input-field">
	<input type="text" name="titulo" class="validade" value="{{ isset($registro->titulo) ? $registro->titulo : '' }}">
	<label>Título</label>
</div>
<div class="input-field">
	<input type="text" name="descricao" class="validade" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field">
	<input type="text" name="link" class="validade" value="{{ isset($registro->link) ? $registro->link : '' }}">
	<label>Link</label>
</div>
<div class="input-field col s6">
    <select name="publicado">
        <option value="nao" {{(isset($registro->publicado) && $registro->publicado == 'nao'  ? 'selected' : '')}}>Não</option>
        <option value="sim" {{(isset($registro->publicado) && $registro->publicado == 'sim'  ? 'selected' : '')}}>Sim</option>
    </select>
    <label for="publicado"> Publicar?</label>
</div>

<div class="input-fieldcol s6 ">
	<input type="text" name="ordem" class="validade" value="{{ isset($registro->ordem) ? $registro->ordem : '' }}">
	<label>Ordem</label>
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
		<img width="120" src="{{ asset($registro->imagem) }}">
	</div>
</div>
@else

	<div class="file-field input-field col m6 s12">
        <p class="center">Você pode selecionar várias imagens para esse controle.</p>
		<div class="btn">
			<span>Upload de Imagens</span>
			<input type="file" multiple name="imagens[]">
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validade">
		</div>
	</div>

@endif
