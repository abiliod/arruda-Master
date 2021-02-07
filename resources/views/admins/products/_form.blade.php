<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem Capa</span>
            <input type="file" name="imagem_capa" id="imagem_capa" >
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validade">
        </div>
    </div>
    <div class="col m6 s12">
        @if(isset($registro->imagem_capa))
            <img width="120" src="{{ asset( $registro->imagem_capa ) }}">
        @endif
    </div>
</div>

<div class="row col-12">
     <div class="file-field input-field col  col-sm-6">
    <div class="btn">
        <span>Imagens</span>
        <input type="file" id="imagems" name="imagems[]" multiple/>
    </div>
    <div class="file-path-wrapper">
        <input type="text" class="file-path validade">
    </div>
</div>
</div>

<div class="row col-12">
    <span class="text-danger">{{ $errors->first('imagems') }}</span>
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

@if (isset($registro->id))
    <div class="row col-12">
        <a class="btn orange" href="{{ route('admins.variacoes',$registro->id) }}">+ Variações</a>
    </div>
@endif

<div class="row col-12">
    <div class="input-field col-sm-2">
        <input type="text" style="text-transform: uppercase;" id="referencia" maxlength="5" name="referencia" class="validate"
               value="{{ isset($registro->referencia) ? $registro->referencia : old('referencia')  }}">
        <label   for="referencia"     class="@if ($errors->has('referencia')) text-danger @endif">
            @if ($errors->has('referencia')) {{ $errors->first('referencia') }}
            @else Referência: @endif</label>
    </div>

    <div class="input-field col-sm-4 ">
            <select name="sub_category" id="sub_category" >
                @if (! old('sub_category'))
                    <option value="" {{(isset($registro->sub_category) && $registro->sub_category == ''  ? 'selected' : '')}}>Selecione</option>
                @else
                    <option value="{{old('sub_category')}}" selected="selected" >{{ old('sub_category') }}</option>
                @endif
                <option value="Calçados" {{(isset($registro->sub_category) && $registro->sub_category == 'Calçados'  ? 'selected' : '')}}>Calçados</option>
                <option value="Bolsas" {{(isset($registro->sub_category) && $registro->sub_category == 'Bolsas'  ? 'selected' : '')}}>Bolsas</option>
                <option value="Cintos" {{(isset($registro->sub_category) && $registro->sub_category == 'Cintos'  ? 'selected' : '')}}>Cintos</option>
            </select>
            <label for="sub_category" class="@if ($errors->has('sub_category')) text-danger @endif">
                @if ($errors->has('sub_category')) {{ $errors->first('sub_category') }}
                @else Categoria @endif
            </label>
        </div>

    <div class="input-field col-sm-4">
            <input type="text"  id="descricao" name="descricao" style="text-transform: uppercase;" class="validate" value="{{ isset($registro->descricao) ? $registro->descricao : old('descricao')}}">
            <label for="descricao"  class="@if ($errors->has('descricao')) text-danger @endif">
                @if ($errors->has('descricao')) {{ $errors->first('descricao') }}
                @else Descrição: @endif</label>
        </div>

    <div class="input-field col-sm-2">
                <select name="tipo_un" id="tipo_un">
                    @if (! old('tipo_un'))
                        <option value="" {{(isset($registro->tipo_un) && $registro->tipo_un  == ''  ? 'selected' : '')}}>Selecione</option>
                    @else
                        <option value="{{old('tipo_un')}}" selected="selected" >{{ old('tipo_un') }}</option>
                    @endif

                    <option value="PAR" {{(isset($registro->tipo_un) && $registro->tipo_un == 'PAR'  ? 'selected' : '')}}>PAR</option>
                    <option value="PC" {{(isset($registro->tipo_un) && $registro->tipo_un == 'PC'  ? 'selected' : '')}}>PC</option>
                    <option value="KIT" {{(isset($registro->tipo_un) && $registro->tipo_un == 'KIT'  ? 'selected' : '')}}>KIT</option>
                    <option value="GRADE" {{(isset($registro->tipo_un) && $registro->tipo_un == 'GRADE'  ? 'selected' : '')}}>GRADE</option>
                    <option value="UN" {{(isset($registro->tipo_un) && $registro->tipo_un == 'UN'  ? 'selected' : '')}}>UN</option>
                </select>
                <label for="tipo_un"  class="@if ($errors->has('tipo_un')) text-danger @endif">
                    @if ($errors->has('tipo_un')) {{ $errors->first('tipo_un') }}
                    @else Tipo UN:  @endif</label>
            </div>

</div>
<div class="row col-12">
    <div class="input-field col-sm-4">
        <select name="colecao_id" id="colecao_id">
            @if (! old('colecao_id'))
                <option value=""
                        selected="selected">
                    Selecione
                </option>
            @else
                <option value="{{old('colecao_id')}}"
                        selected="selected">
                </option>
            @endif
            @foreach($colecaos as $colecao)
                <option value="{{ $colecao->id }}"
                    {{(isset($registro->colecao_id)
                    && $registro->colecao_id == $colecao->id
                      ? 'selected' : '')}}>
                    {{ $colecao->colecao_description}}
                </option>
            @endforeach
        </select>
        <label for="colecao_id"  class="@if ($errors->has('colecao_id')) text-danger @endif">
            @if ($errors->has('colecao_id')) {{ $errors->first('colecao_id') }}
            @else Coleção: @endif</label>
    </div>

    <div class="input-field col-sm-4">
        <select name="modelo_id" id="modelo_id">
            @if (! old('modelo_id'))
                <option value=""
                        selected="selected">
                    Selecione
                </option>
            @else
                <option value="{{old('modelo_id')}}"
                        selected="selected">
                    {{ $registro->modelo_description }}
                </option>
{{--                <option value="{{old('modelo_id')}}" selected="selected" >{{ $registro->modelo_description }}</option>--}}
            @endif
            @foreach($modelos as $modelo)
                <option value="{{ $modelo->id }}"
                    {{(isset($registro->modelo_id)
                    && $registro->modelo_id == $modelo->id
                      ? 'selected' : '')}}>
                    {{ $modelo->modelo_description}}
                </option>
            @endforeach
        </select>
        <label for="modelo_id" class="@if ($errors->has('modelo_id')) text-danger @endif">
            @if ($errors->has('modelo_id')) {{ $errors->first('modelo_id') }}
            @else Opções de Modelo: @endif</label>
    </div>

    <div class="input-field col-sm-4">
        <select name="composicao" id="composicao">
            @if (! old('composicao'))
                <option value="" {{(isset($registro->composicao) && $registro->composicao == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('composicao')}}" selected="selected" >{{ old('composicao') }}</option>
            @endif
            <option value="Nobuque" {{(isset($registro->composicao) && $registro->composicao == 'Nobuque'  ? 'selected' : '')}}>Nobuque</option>
            <option value="Camurça" {{(isset($registro->composicao) && $registro->composicao == 'Camurça'  ? 'selected' : '')}}>Camurça</option>
            <option value="Verniz" {{(isset($registro->composicao) && $registro->composicao == 'Verniz'  ? 'selected' : '')}}>Verniz</option>
            <option value="Napa" {{(isset($registro->composicao) && $registro->composicao == 'Napa'  ? 'selected' : '')}}>Napa</option>
            <option value="Floral" {{(isset($registro->composicao) && $registro->composicao == 'Floral'  ? 'selected' : '')}}>Floral</option>
        </select>
        <label for="composicao"   class="@if ($errors->has('composicao')) text-danger @endif">
            @if ($errors->has('composicao')) {{ $errors->first('composicao') }}
            @else Composição @endif
        </label>
    </div>
</div>

<div class="row col-12">
    <div class="input-field col-sm-4">
        <select name="genero" id="genero">
            @if (! old('genero'))
                <option value="" {{(isset($registro->genero) && $registro->genero == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('genero')}}" selected="selected" >{{ old('genero') }}</option>
            @endif

            <option value="Feminino" {{(isset($registro->genero) && $registro->genero == 'Feminino'  ? 'selected' : '')}}>Feminino</option>
            <option value="Masculino" {{(isset($registro->genero) && $registro->genero == 'Masculino'  ? 'selected' : '')}}>Masculino</option>
            <option value="Unissex" {{(isset($registro->genero) && $registro->genero == 'Unissex'  ? 'selected' : '')}}>Unissex</option>
        </select>
        <label for="genero"  class="@if ($errors->has('genero')) text-danger @endif">
            @if ($errors->has('genero')) {{ $errors->first('genero') }}
            @else Gênero @endif</label>
    </div>

    <div class="input-field col-sm-4">
        <select name="palmilha" id="palmilha">
            @if (! old('palmilha'))
                <option value="" {{(isset($registro->palmilha) && $registro->palmilha == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('palmilha')}}" selected="selected" >{{ old('palmilha') }}</option>
            @endif

            <option value="CONFORT" {{(isset($registro->palmilha) && $registro->palmilha == 'CONFORT'  ? 'selected' : '')}}>CONFORT</option>
            <option value="TRADICIONAL" {{(isset($registro->palmilha) && $registro->palmilha == 'TRADICIONAL'  ? 'selected' : '')}}>TRADICIONAL</option>
            <option value="PRETO" {{(isset($registro->palmilha) && $registro->palmilha == 'PRETO'  ? 'selected' : '')}}>PRETO</option>
            <option value="BEJE" {{(isset($registro->palmilha) && $registro->palmilha == 'BEJE'  ? 'selected' : '')}}>BEJE</option>
            <option value="MARFIM" {{(isset($registro->palmilha) && $registro->palmilha == 'MARFIM'  ? 'selected' : '')}}>MARFIM</option>
        </select>
        <label for="palmilha">Opções de Palmilha</label>
    </div>

    <div class="input-field col-sm-4">
        <select name="salto" id="salto">
            @if (! old('salto'))
                <option value="" {{(isset($registro->salto) && $registro->salto == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('salto')}}" selected="selected" >{{ old('salto') }}</option>
            @endif

            <option value="Fino" {{(isset($registro->salto) && $registro->salto == 'Fino'  ? 'selected' : '')}}>Fino</option>
            <option value="Bloco" {{(isset($registro->salto) && $registro->salto == 'Bloco'  ? 'selected' : '')}}>Bloco</option>
            <option value="Taça" {{(isset($registro->salto) && $registro->salto == 'Taça'  ? 'selected' : '')}}>Taça</option>
        </select>
        <label for="salto">Opções de Salto</label>
    </div>

</div>

<div class="row col-12">
    <div class="input-field col-sm-3">
        <select name="solado" id="solado">
            @if (! old('solado'))
                <option value="" {{(isset($registro->solado) && $registro->solado == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('solado')}}" selected="selected" >{{ old('solado') }}</option>
            @endif

            <option value="PVC" {{(isset($registro->solado) && $registro->solado == 'PVC'  ? 'selected' : '')}}>PVC</option>
            <option value="TR" {{(isset($registro->solado) && $registro->solado == 'TR'  ? 'selected' : '')}}>TR</option>
            <option value="SOFORT" {{(isset($registro->solado) && $registro->solado == 'SOFORT'  ? 'selected' : '')}}>SOFORT</option>
        </select>
        <label for="solado">Opções de Solado</label>
    </div>

    <div class="input-field col-sm-3">
        <select name="altura" id="altura">
            @if (! old('altura'))
                <option value="" {{(isset($registro->altura) && $registro->altura == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('altura')}}" selected="selected" >{{ old('altura') }}</option>
            @endif

            <option value="15" {{(isset($registro->altura) && $registro->altura == '15'  ? 'selected' : '')}}>15 Cm</option>
            <option value="20" {{(isset($registro->altura) && $registro->altura == '20'  ? 'selected' : '')}}>20 Cm</option>
            <option value="30" {{(isset($registro->altura) && $registro->altura == '30'  ? 'selected' : '')}}>30 Cm</option>
        </select>
        <label for="altura">Opções de Altura</label>
    </div>

    <div class="input-field col-sm-6" id="descricaolonga">
        <i class="material-icons prefix">mode_edit</i>
        <textarea   style="text-transform: capitalize;" id="descricaolonga" name="descricaolonga" class="materialize-textarea">
             {{ isset($registro->descricaolonga) ? $registro->descricaolonga : '' }}
        </textarea>
        <label for="descricaolonga"     class="@if ($errors->has('descricaolonga')) text-danger @endif">
            @if ($errors->has('descricaolonga')) {{ $errors->first('descricaolonga') }}
            @else Descrição_Complementar: @endif</label>
    </div>
</div>

<div class="row col-12">
    <div class="input-field col-sm-2">
        <input type="text" style="text-transform: uppercase;" id="acessorios" name="acessorios" class="validate"
               value="{{ isset($registro->acessorios) ? $registro->acessorios : old('acessorios') }}">
        <label for="acessorios">Opções de Acessórios</label>
    </div>

    <div class="input-field col-sm-2">
        <select name="publicar" id="publicar">
            @if (! old('publicar'))
                <option value="" {{(isset($registro->publicar) && $registro->publicar == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('publicar')}}" selected="selected" >{{ old('publicar') }}</option>
            @endif
            <option value="nao" {{(isset($registro->publicar) && $registro->publicar == 'nao'  ? 'selected' : '')}}>Não</option>
            <option value="sim" {{(isset($registro->publicar) && $registro->publicar == 'sim'  ? 'selected' : '')}}>Sim</option>
        </select>
        <label for="publicar">Publicar ?</label>
    </div>


    <div class="input-field col-sm-8" id="detalhe">
        <i class="material-icons prefix">mode_edit</i>
        <textarea   style="text-transform: capitalize;"  id="detalhe" name="detalhe" class="materialize-textarea">
            {{ isset($registro->detalhe) ? $registro->detalhe : '' }}
        </textarea>
        <label for="detalhe" class="@if ($errors->has('detalhe')) text-danger @endif">
            @if ($errors->has('detalhe')) {{ $errors->first('detalhe') }}
            @else Detalhes De Fabricação: @endif</label>
    </div>
</div>
