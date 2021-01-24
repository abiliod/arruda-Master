
    <div class="row col s12">
        <div class="input-field col s6">
            <input name="cep" type="text" id="cep"
                    value="{{ isset($endereco->cep) ? $endereco->cep : '' }}"
                    readonly size="10" maxlength="9"
                    onblur="pesquisacep(this.value);" />
            <label>CEP</label>
        </div>
    </div>

    <div class="row col s12">
        <div class="input-field col s5">
        <input type="text"  id="rua" name="logradouro" class="validade"
        value="{{isset($endereco->logradouro) ? $endereco->logradouro : ''}}" readonly />
            <label class="active">Logradouro</label>
        </div>
        <div class="input-field col s2">
        <input name="numero" type="text" size="40"
        value="{{isset($endereco->numero) ? $endereco->numero : ''}}"/>
            <label class="active">Número</label>
        </div>
        <div class="input-field col s2">
        <input name="complemento" type="text" size="40"
        value="{{isset($endereco->complemento) ? $endereco->complemento : ''}}"
        onkeyup="this.value = this.value.toUpperCase();"/>
            <label class="active">Complemento</label>
        </div>
        <div class="input-field col s3">
        <input name="bairro" type="text" id="bairro" size="40"
        value="{{isset($endereco->bairro) ? $endereco->bairro : ''}}" readonly/>
            <label class="active">Bairro</label>
        </div>
    </div>

    <div class="row col s12">
        <div class="input-field col s6">
            <input name="cidade" type="text" id="cidade" size="40"
            value="{{isset($endereco->cidade) ? $endereco->cidade : ''}}" readonly/>
            <label class="active">Cidade</label>
        </div>

        <div class="input-field col s2">
            <input name="uf" id="uf" type="text"  size="40"
            value="{{ isset($endereco->estado) ? $endereco->estado : '' }}" readonly />
            <label class="active">Estado</label>
        </div>
        <div class="input-field col m4 s12">
            <select name="tipo" >
            <option value="" disabled selected>Escolha uma opção</option>
            <option value="Comercial" {{(isset($endereco->tipo) && $endereco->tipo == 'Comercial'  ? 'selected' : '')}}>Comercial</option>
            <option value="Residencial" {{(isset($endereco->tipo) && $endereco->tipo == 'Residencial'  ? 'selected' : '')}}>Residencial</option>
            <option value="Entrega" {{(isset($endereco->tipo) && $endereco->tipo == 'Entrega'  ? 'selected' : '')}}>Entrega</option>
            </select>
            <label>Tipo de Endereço</label>
        </div>
    </div>


