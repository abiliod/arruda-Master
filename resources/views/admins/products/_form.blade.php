
<div class="row col-12">
    <div class="file-field input-field col  col-sm-6">
        <div class="btn">
            <span>Imagem</span>
            <input type="file" id="imagem" name="imagem[]" multiple/>
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validade">
        </div>
    </div>
</div>

<div class="row col-12">
    <span class="text-danger">{{ $errors->first('imagem') }}</span>
    <div id="thumb-output"></div>
    <br>
    <div class="row col s12">
        @if(!empty($registro->directory))
            @foreach(File::glob(($registro->directory.'*.*')) as $imagem)
                <a href="javascript:
                    if(confirm('Deletar essa Imagem?'))
                        { window.location.href = '{{ route('admins.products.destroyfiles',str_replace('/', '-', $imagem).'&'.$registro->id) }}' }">
                    &ensp;<img display:inline; width="120"  src="{{asset( $imagem )}}">
                </a>
            @endforeach
        @endif
    </div>
</div>

<div class="row col-12">
    <div class="input-field col-sm-2">
        <input type="text" name="referencia" class="validate" value="{{ isset($registro->referencia) ? $registro->referencia : '' }}">
        <label>Referência:</label>
</div>

<div class="input-field col-sm-4">
    <select name="sub_category" id="sub_category">
        <option value="" {{(isset($registro->sub_category) && $registro->sub_category == ''  ? 'selected' : '')}}>Selecione</option>
        <option value="Calçados" {{(isset($registro->sub_category) && $registro->sub_category == 'Calçados'  ? 'selected' : '')}}>Calçados</option>
        <option value="Bolsas" {{(isset($registro->sub_category) && $registro->sub_category == 'Bolsas'  ? 'selected' : '')}}>Bolsas</option>
        <option value="Cintos" {{(isset($registro->sub_category) && $registro->sub_category == 'Cintos'  ? 'selected' : '')}}>Cintos</option>
    </select>
    <label id="sub_category">Sub Categoria</label>
</div>

<div class="input-field col-sm-4">
    <input type="text" name="descricao" class="validate" value="{{ isset($registro->descricao) ? $registro->descricao : '' }}">
    <label>Descrição:</label>
</div>
<div class="input-field col-sm-2">
    <select name="colecao_id" id="colecao_id">
        @foreach($colecaos as $colecao)
            <option value="{{ $colecao->id }}" {{(isset($registro->colecao_id) && $registro->colecao_id == $colecao->id  ? 'selected' : '')}}>{{ $colecao->colecao_description }}</option>
        @endforeach
    </select>
    <label id="colecao_id">Coleção</label>
</div>

</div>
<div class="row col-12">
    <div class="input-field col-sm-4">
        <select name="modelo_id" id="modelo_id">
            @foreach($modelos as $modelo)
                <option value="{{ $modelo->id }}" {{(isset($registro->modelo_id) && $registro->modelo_id == $modelo->id  ? 'selected' : '')}}>{{ $modelo->modelo_description }}</option>
            @endforeach
        </select>
        <label id="modelo_id">Modelo</label>
    </div>
    <div class="input-field col-sm-4">
        <select name="composicao" id="composicao">
            <option value="" {{(isset($registro->composicao) && $registro->composicao == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="Nobuque" {{(isset($registro->composicao) && $registro->composicao == 'Nobuque'  ? 'selected' : '')}}>Nobuque</option>
            <option value="Camurça" {{(isset($registro->composicao) && $registro->composicao == 'Camurça'  ? 'selected' : '')}}>Camurça</option>
            <option value="Verniz" {{(isset($registro->composicao) && $registro->composicao == 'Verniz'  ? 'selected' : '')}}>Verniz</option>
            <option value="Napa" {{(isset($registro->composicao) && $registro->composicao == 'Napa'  ? 'selected' : '')}}>Napa</option>
            <option value="Floral" {{(isset($registro->composicao) && $registro->composicao == 'Floral'  ? 'selected' : '')}}>Floral</option>
        </select>
        <label id="composicao">Composição</label>
    </div>
    <div class="input-field col-sm-4">
        <select name="genero" id="genero">
            <option value="" {{(isset($registro->genero) && $registro->genero == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="Feminino" {{(isset($registro->genero) && $registro->genero == 'Feminino'  ? 'selected' : '')}}>Feminino</option>
            <option value="Masculino" {{(isset($registro->genero) && $registro->genero == 'Masculino'  ? 'selected' : '')}}>Masculino</option>
            <option value="Unissex" {{(isset($registro->genero) && $registro->genero == 'Unissex'  ? 'selected' : '')}}>Unissex</option>
        </select>
        <label id="genero">Genero</label>
    </div>

</div>

<div class="row col-12">
    <div class="input-field col-sm-4">
        <select name="cor" id="cor">
            <option value="" {{(isset($registro->cor) && $registro->cor == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="PRETO,BRANCO,MARFIM" {{(isset($registro->cor) && $registro->cor == 'PRETO,BRANCO,MARFIM'  ? 'selected' : '')}}>PRETO,BRANCO,MARFIM</option>
            <option value="PRETO" {{(isset($registro->cor) && $registro->cor == 'PRETO'  ? 'selected' : '')}}>PRETO</option>
            <option value="BRANCO" {{(isset($registro->cor) && $registro->cor == 'BRANCO'  ? 'selected' : '')}}>BRANCO</option>
            <option value="MARFIM" {{(isset($registro->cor) && $registro->cor == 'MARFIM'  ? 'selected' : '')}}>MARFIM</option>
        </select>
        <label id="cor">Opções de Cores</label>
    </div>
    <div class="input-field col-sm-4">
        <select name="palmilha" id="palmilha">
            <option value="" {{(isset($registro->palmilha) && $registro->palmilha == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="CONFORT" {{(isset($registro->palmilha) && $registro->palmilha == 'CONFORT'  ? 'selected' : '')}}>CONFORT</option>
            <option value="TRADICIONAL" {{(isset($registro->palmilha) && $registro->palmilha == 'TRADICIONAL'  ? 'selected' : '')}}>TRADICIONAL</option>
            <option value="PRETO" {{(isset($registro->palmilha) && $registro->palmilha == 'PRETO'  ? 'selected' : '')}}>PRETO</option>
            <option value="BEJE" {{(isset($registro->palmilha) && $registro->palmilha == 'BEJE'  ? 'selected' : '')}}>BEJE</option>
            <option value="MARFIM" {{(isset($registro->palmilha) && $registro->palmilha == 'MARFIM'  ? 'selected' : '')}}>MARFIM</option>
        </select>
        <label id="palmilha">Opções de Palmilha</label>
    </div>

    <div class="input-field col-sm-4">
        <select name="salto" id="salto">
            <option value="" {{(isset($registro->salto) && $registro->salto == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="Fino" {{(isset($registro->salto) && $registro->salto == 'Fino'  ? 'selected' : '')}}>Fino</option>
            <option value="Bloco" {{(isset($registro->salto) && $registro->salto == 'Bloco'  ? 'selected' : '')}}>Bloco</option>
            <option value="Taça" {{(isset($registro->salto) && $registro->salto == 'Taça'  ? 'selected' : '')}}>Taça</option>
        </select>
        <label id="salto">Opções de Salto</label>
    </div>
</div>

<div class="row col-12">
    <div class="input-field col-sm-4">
        <select name="solado" id="solado">
            <option value="" {{(isset($registro->solado) && $registro->solado == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="PVC" {{(isset($registro->solado) && $registro->solado == 'PVC'  ? 'selected' : '')}}>PVC</option>
            <option value="TR" {{(isset($registro->solado) && $registro->solado == 'TR'  ? 'selected' : '')}}>TR</option>
            <option value="SOFORT" {{(isset($registro->solado) && $registro->solado == 'SOFORT'  ? 'selected' : '')}}>SOFORT</option>
        </select>
        <label id="solado">Opções de Solado</label>
    </div>
    <div class="input-field col-sm-4">
        <input type="text" name="numeracao_br" id="numeracao_br" class="validate" value="{{ isset($registro->numeracao_br) ? $registro->numeracao_br : '' }}">
        <label id="numeracao_br" >Numerações Disponíveis (BR) Ex: 33,34,35: </label>
    </div>

    <div class="input-field col-sm-4">
        <input type="text" name="numeracao_eua"  id="numeracao_eua" class="validate" value="{{ isset($registro->numeracao_eua) ? $registro->numeracao_eua : '' }}">
        <label for="numeracao_eua">Numerações Disponíveis (USA) Ex: 7,9,2 :</label>
    </div>

</div>


<div class="row col-12">
    <div class="input-field col-sm-3">
        <input type="text" id="acessorios" name="acessorios" class="validate" value="{{ isset($registro->acessorios) ? $registro->acessorios : '' }}">
        <label for="acessorios">Opções de Acessórios</label>
    </div>


    <div class="input-field col-sm-3">
        <input type="text" id="preco" name="preco" class="validate"
{{--               falta formatar para exibir e fazer o reverse para enviar para gravação no evento do submit--}}
               value="{{ isset($registro->preco) ? number_format($registro->preco, 2, ",", ".") : '' }}">

        <label for="preco">Preço Unitário R$:</label>

    </div>

    <div class="input-field col-sm-3">
        <input type="text" id="desconto" name="desconto" class="validate" value="{{ isset($registro->desconto) ? $registro->desconto : '' }}">
        <label for="desconto">Desconto em Porcentagem: Ex: 5</label>
    </div>

    <div class="input-field col-sm-3">
        <input type="text" name="estoque" class="validate" value="{{ isset($registro->estoque) ? $registro->estoque : '' }}">
{{--         [+ Detalhes] criar um modulo para gerenciar o estoque a partir da composição de chave  ex. ref + Numero quando calçado--}}
        <label id="estoque">Estoque: [+ Detalhes]</label>
    </div>

</div>
<div class="row col-12">
    <div class="input-field col-sm-6" id="descricaolonga">
        <i class="material-icons prefix">mode_edit</i>
        <textarea  id="descricaolonga" name="descricaolonga" class="materialize-textarea">
             {{ isset($registro->descricaolonga) ? $registro->descricaolonga : '' }}
        </textarea>
        <label for="descricaolonga">Descrição Longa:</label>
    </div>

    <div class="input-field col-sm-6" id="detalhe">
        <i class="material-icons prefix">mode_edit</i>
        <textarea  id="detalhe" name="detalhe" class="materialize-textarea">
            {{ isset($registro->detalhe) ? $registro->detalhe : '' }}
        </textarea>
        <label for="detalhe">Detalhe:</label>
    </div>
</div>
<div class="row col-12">
    <div class="input-field col-sm-4">
        <select name="tamanho" id="tamanho">
            <option value="" {{(isset($registro->tamanho) && $registro->tamanho == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="P" {{(isset($registro->tamanho) && $registro->tamanho == 'P'  ? 'selected' : '')}}>P Pequeno</option>
            <option value="M" {{(isset($registro->tamanho) && $registro->tamanho == 'M'  ? 'selected' : '')}}>M Médio</option>
            <option value="G" {{(isset($registro->tamanho) && $registro->tamanho == 'G'  ? 'selected' : '')}}>G Grande</option>
        </select>
        <label id="tamanho">Opções de Variação</label>
    </div>

    <div class="input-field col-sm-4">
        <select name="altura" id="altura">
            <option value="" {{(isset($registro->altura) && $registro->altura == ''  ? 'selected' : '')}}>Selecione</option>
            <option value="15" {{(isset($registro->altura) && $registro->altura == '15'  ? 'selected' : '')}}>15 Cm</option>
            <option value="20" {{(isset($registro->altura) && $registro->altura == '20'  ? 'selected' : '')}}>20 Cm</option>
            <option value="30" {{(isset($registro->altura) && $registro->altura == '30'  ? 'selected' : '')}}>30 Cm</option>
        </select>
        <label id="altura">Opções de Altura</label>
    </div>
</div>


