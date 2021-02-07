
<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn">
            <span>Imagem do Item</span>
            <input type="file" name="imagem_product" id="imagem_product" >
        </div>
        <div class="file-path-wrapper">
            <input type="text" class="file-path validade">
        </div>
    </div>
    <div class="col m6 s12">
        @if(isset($registro->imagem_product))
            <img width="120" src="{{ asset( $registro->imagem_product ) }}">
        @endif
    </div>
</div>



<div class="row col-12">
    <div class="input-field col-sm-3">
        <select name="cor" id="cor" class="icons">
            @if (! old('cor'))
                <option value="" {{(isset($registro->cor) && $registro->cor == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('cor')}}" data-icon="{{asset( old('data-icon/amarelo-medio.jpg') ) }}" class="left circle" selected="selected" >{{ old('cor') }}</option>
            @endif
                <option value="amarelo-medio" data-icon = "{{asset('data-icon/amarelo-medio.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'amarelo-medio'  ? 'selected' : '')}}>Amarelo Médio</option>

                <option value="amarelo-ouro" data-icon="{{asset('data-icon/amarelo-ouro.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'amarelo-ouro'  ? 'selected' : '')}}>Amarelo Ouro</option>

                <option value="azul-ceu" data-icon="{{asset('data-icon/azul-ceu.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'azul-ceu'  ? 'selected' : '')}}>Azul Ceu</option>

                <option value="azul-marinho" data-icon="{{asset('data-icon/azul-marinho.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'azul-marinho'  ? 'selected' : '')}}>Azul Marinho</option>
                <option value="azul-medio" data-icon="{{asset('data-icon/azul-medio.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'azul-medio'  ? 'selected' : '')}}>Azul Médio</option>
                <option value="branco" data-icon="{{asset('data-icon/branco.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'branco'  ? 'selected' : '')}}>branco</option>
                <option value="bordô" data-icon="{{asset('data-icon/bordô.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'bordô'  ? 'selected' : '')}}>Bordô</option>
                <option value="cinza-claro" data-icon="{{asset('data-icon/cinza-claro.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'cinza-claro'  ? 'selected' : '')}}>Cinza Claro</option>
                <option value="cinza-escuro" data-icon="{{asset('data-icon/cinza-escuro.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'cinza-escuro'  ? 'selected' : '')}}>Cinza Escuro</option>

                <option value="laranja" data-icon="{{asset('data-icon/laranja.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'laranja'  ? 'selected' : '')}}>Laranja</option>
                <option value="marron" data-icon="{{asset('data-icon/marron.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'marron'  ? 'selected' : '')}}>Marron</option>
                <option value="pink" data-icon="{{asset('data-icon/pink.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'pink'  ? 'selected' : '')}}>pink</option>
                <option value="prata" data-icon="{{asset('data-icon/prata.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'prata'  ? 'selected' : '')}}>Prata</option>
                <option value="preto" data-icon="{{asset('data-icon/preto.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'preto'  ? 'selected' : '')}}>Preto</option>

                <option value="rosa-claro" data-icon="{{asset('data-icon/rosa-claro.jpg')}}" class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'rosa-claro'  ? 'selected' : '')}}>Rosa Claro</option>
                <option value="verde-abacate" data-icon="{{asset('data-icon/verde-abacate.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'verde-abacate'  ? 'selected' : '')}}>Verde-Abacate</option>
                <option value="verde-amazonas" data-icon="{{asset('data-icon/verde-amazonas.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'verde-amazonas'  ? 'selected' : '')}}>Verde Amazonas</option>
                <option value="verde-escuro" data-icon="{{asset('data-icon/verde-escuro.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'verde-escuro'  ? 'selected' : '')}}>Verde Escuro</option>
                <option value="vermelho" data-icon="{{asset('data-icon/vermelho.jpg')}} " class="left circle"
                    {{(isset($registro->cor) && $registro->cor == 'vermelho'  ? 'selected' : '')}}>Vermelho</option>
        </select>
        <label for="cor" class="@if ($errors->has('cor')) text-danger @endif">
            @if ($errors->has('cor')) {{ $errors->first('cor') }}
            @else Opções de Cores: @endif</label>
    </div>

    <div class="input-field col-sm-3">
        <input type="number" min="1" step="any"  placeholder=" EX: 53,25"  id="preco" name="preco" class="validate"
               value="{{ isset($registro->preco) ? $registro->preco : old('preco') }}">
        <label for="preco" Class="@if ($errors->has('preco')) text-danger @endif">
            @if ($errors->has('preco')) {{ $errors->first('preco') }}
            @else Preço: @endif</label>
    </div>



    <div class="input-field col-sm-2">
        <input type="text" name="tamanho_br" id="tamanho_br" placeholder="Ex: 33 ou P M G XG" class="validate"
               value="{{ isset($registro->tamanho_br) ? $registro->tamanho_br :  old('tamanho_br') }}">
        <label for="tamanho_br" Class="@if ($errors->has('tamanho_br')) text-danger @endif">
            @if ($errors->has('tamanho_br')) {{ $errors->first('tamanho_br') }}
            @else Numeração (PT_BR): @endif</label>
    </div>

    <div class="input-field col-sm-2">
        <input type="number" min="0.101" max="0.499" step="any"  placeholder=" EX: 0,350"  id="peso_liq"
               name="peso_liq" class="validate"
               value="{{ isset($registro->peso_liq) ? $registro->peso_liq : old('peso_liq') }}">
        <label for="peso_liq" Class="@if ($errors->has('peso_liq')) text-danger @endif">
            @if ($errors->has('peso_liq')) {{ $errors->first('peso_liq') }}
            @else Peso Liquido: @endif</label>
    </div>

    <div class="input-field col-sm-2">
        <input type="number"  min="0.101" max="0.499" step="any" step="any"  placeholder=" EX: 0,350"  id="peso_bruto" name="peso_bruto" class="validate"
               value="{{ isset($registro->peso_bruto) ? $registro->peso_bruto : old('peso_bruto') }}">
        <label for="peso_liq" Class="@if ($errors->has('peso_bruto')) text-danger @endif">
            @if ($errors->has('peso_bruto')) {{ $errors->first('peso_bruto') }}
            @else Peso Bruto: @endif</label>
    </div>

</div>
<div class="row col-12">

    <div class="input-field col-sm-2">
    <input type="number" name="estoque" id="estoque" placeholder="Ex: 0" class="validate"
           value="{{ isset($registro->estoque) ? $registro->estoque : old('estoque') }}">
    <label for="estoque" Class="@if ($errors->has('estoque')) text-danger @endif">
        @if ($errors->has('estoque')) {{ $errors->first('estoque') }}
        @else Estoque: @endif</label>
    </div>

    <div class="input-field col-sm-2">
        <input type="number" name="desconto" id="desconto" placeholder="Ex: 0" class="validate"
               value="{{ isset($registro->desconto) ? $registro->desconto : old('desconto') }}">
        <label for="desconto" Class="@if ($errors->has('desconto')) text-danger @endif">
            @if ($errors->has('desconto')) {{ $errors->first('desconto') }}
            @else Desconto: @endif</label>
    </div>



    <div class="input-field col-sm-2">
        <select name="altura" id="altura">
            @if (! old('altura'))
                <option value="" {{(isset($registro->altura) && $registro->altura == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('altura')}}" selected="selected" >{{ old('altura') }}</option>
            @endif
            <option value="10 Cm" {{(isset($registro->altura) && $registro->altura == '10'  ? 'selected' : '')}}>10 Cm</option>
            <option value="15 Cm" {{(isset($registro->altura) && $registro->altura == '15'  ? 'selected' : '')}}>15 Cm</option>
            <option value="20 Cm" {{(isset($registro->altura) && $registro->altura == '20'  ? 'selected' : '')}}>20 Cm</option>
            <option value="30 Cm" {{(isset($registro->altura) && $registro->altura == '30'  ? 'selected' : '')}}>30 Cm</option>
            <option value="35 Cm" {{(isset($registro->altura) && $registro->altura == '35'  ? 'selected' : '')}}>35 Cm</option>
        </select>
        <label for="altura">Opções de Altura:</label>
    </div>

    <div class="input-field col-sm-2">
        <select name="status" id="status">
            @if (! old('status'))
                <option value="" {{(isset($registro->status) && $registro->status == ''  ? 'selected' : '')}}>Selecione</option>
            @else
                <option value="{{old('status')}}" selected="selected" >{{ old('status') }}</option>
            @endif
                <option value="aluga" {{(isset($registro->status) && $registro->status == 'aluga'  ? 'selected' : '')}}>Aluga</option>
                <option value="vende" {{(isset($registro->status) && $registro->status == 'vende'  ? 'selected' : '')}}>Vende</option>
        </select>
        <label for="status">Status:</label>
    </div>

    <div class="input-field col-sm-4">
        <input type="text"  name="tamanho_eua"  id="tamanho_eua" placeholder="Ex: 7 ou P M G XG" class="validate"
               value="{{ isset($registro->tamanho_eua) ? $registro->tamanho_eua :  old('tamanho_eua') }}">
        <label for="tamanho_eua">Numeração (USA):</label>
    </div>
</div>








