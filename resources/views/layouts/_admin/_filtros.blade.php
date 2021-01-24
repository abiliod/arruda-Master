<div class="row section #fafafa grey lighten-5" >
	<form class="col s12" action="#!"  >
		<div class="input-field col s6 m6">
			<select name="categoria">
				<option value="" disabled selected>Todas Categorias</option>
				<option value="1">PROTEÇÃO</option>
				<option value="2">COMANDO</option>
				<option value="3">SINALIZAÇÃO</option>
			</select>
			<label>CATEGORIA</label>
		</div>
		<div class="input-field col s6 m6">
			<select name="grupo">
				<option >Todos Grupos</option>
				<option >INTERRUPTOR DR</option>
				<option >DISJUNTOR CX MOLDADA LKM1</option>
				<option >MINI DISJUNTOR DIN</option>
				<option >DISJUNTOR CX MOLDADA DAM1</option>
				<option >FUSIVEL NH E DIAZED</option>
				<option >DISJUNTOR MOTOR</option>
				<option >ACESSORIOS - CX MOLDADA LKM1</option>
				<option >DISPOSITIVO PROTEÇÃO - DPS</option>
			</select>
			<label>GRUPO de PRODUTO</label>
		</div>


		<div class="input-field col s6 m6">
			<select name="Durabilidade_Elétrica">
				<option  value="0">Todos Parâmetros</option>
				<option  value="1">6.000</option>	
			</select>
			<label>DURABILIDADE ELÉTRICA </label>
		</div>

		<div class="input-field col s6 m6">
			<select name="Durabilidade_Mecanica">
				<option  value="0">Todos Parâmetros</option>
				<option  value="1">6.000 Manobras</option>
				<option  value="1">8.000 Manobras</option>	
			</select>
			<label>DURABILIDADE MECANICA</label>
		</div>

		<div class="input-field col s4 m4">
			<select name="modelo_fabricante">
				<option  value="0">Todos Modelos</option>
				<option >F362</option>
				<option >F364</option>
				<option >F1 125</option>
			</select>
			<label>MODELO/REFERENCIA</label>
		</div>
		<div class="input-field col s4 m4">
			<select name="norma">
				<option  value="0">Todos Normas</option>
				<option >NBR NM 61008-1</option>
				<option >NBR NM xxxxx-1</option>
			</select>
			<label>NORMA</label>
		</div>		


		<div class="input-field col s4 m4">
			<select name="corrente_nominal-In">
				<option  value="0">Todas Correntes</option>
				<option >25A</option>
				<option >40A</option>
				<option >63A</option>
				<option >80A</option>
				<option >100A</option>
				<option >125A</option>
			</select>
			<label>CORRENTE NOMINAL (In)</label>
		</div>

		<div class="input-field col s4 m4">
			<select name="polos">
				<option  value="0">Todos Polos</option>
				<option >2</option>
				<option >4</option>
			</select>
			<label>POLOS</label>
		</div>

		<div class="input-field col s4 m4">
			<select name="Temperatura_de_Operacao">
				<option  value="0">Todas Temperaturas</option>
				<option >-5º a +40ºC</option>
				<option >-2º a +50ºC</option>
			</select>
			<label>TEMPERATURA de OPERAÇÃO</label>
		</div>



		<div class="input-field col col s4 m4">
			<select name="valor">
				<option  value="0">Qualquer Preço</option>
				<option  value="1">Até R$ 500,00</option>				
			</select>
			<label>PREÇO</label>
		</div>
		<div class="input-field col col s3 m3">
			<select name="valor">
				<option  value="0">Todos</option>
				<option  value="1">CHINT</option>
				<option  value="1">LUKMA</option>
				<option  value="1">SIEMENS</option>
				<option  value="1">STACK</option>				
			</select>
			<label>MARCA/FABRICANTE</label>
		</div>
				<div class="input-field col col s4 m4">
			<select name="valor">
				<option  value="0">Todos</option>
				<option  value="1">VENDE</option>
				<option  value="1">ALUGA</option>
				<option  value="1">COTAÇÃO COMPRA</option>
				<option  value="1">LICITAÇÃO</option>				
			</select>
			<label>TIPO ORÇAMENTO</label>
		</div>
		<div class="input-field col s5 m5">
			<input class="validate" type="text" name="descricao" placeholder=" EX: MINI DISJUNTOR " value="">
			<label>DESCRICAO</label>
		</div>
		<div class="input-field col s12 m4">
			<button class="btn deep-range darken-1 right">Filtrar</button>
		</div>
	</form>
</div>