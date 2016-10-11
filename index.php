<html>
		<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script src="js/validaDados.js"></script>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script>
			window.onload = function(){
				setTimeout(function() {
				$('.sucesso').fadeOut('fast');}, 3000);
				setTimeout(function() {
				$('.erro').fadeOut('fast');}, 3000);
			}
		</script>
	</head>
	<body>	
		<?php			
			$conexao = mysqli_connect('localhost', 'root', '', 'locadoraveiculos');					
			if(isset($_POST['cadastro'])){
				$marca = $_POST['marcas'];
				$modelo = $_POST['modelo'];
				$ano = $_POST['ano'];
				$dh = '';
				$ac = '';
				$ab = '';
				$al = '';
				$bc = '';
				$sm = '';
				$tv = '';
				$pa = '';
				$ot = '';
				$outro = $_POST['outro'];
				
				$verifica = false;
				$verificaOutro = true;
				 
				if(isset($_POST['dh'])){ $dh = 'S'; $verifica = true; } else { $dh = 'N'; }
				if(isset($_POST['ac'])) { $ac = 'S'; $verifica = true; } else { $ac = 'N'; }
				if(isset($_POST['ab'])) { $ab = 'S'; $verifica = true; } else { $ab = 'N'; }
				if(isset($_POST['al'])) { $al = 'S'; $verifica = true; } else { $al = 'N'; }
				if(isset($_POST['bc'])) { $bc = 'S'; $verifica = true; } else { $bc = 'N'; }
				if(isset($_POST['sm'])) { $sm = 'S'; $verifica = true; } else { $sm = 'N'; }
				if(isset($_POST['tv'])) { $tv = 'S'; $verifica = true; } else { $tv = 'N'; }
				if(isset($_POST['pa'])) { $pa = 'S'; $verifica = true; } else { $pa = 'N'; }
				if(isset($_POST['ot'])) { 
					$verifica = true;
					if(empty($outro)){
						$verificaOutro = false;
					}
				}
				
				if($verifica && $verificaOutro && strlen($outro) >= 2){
					$query = "INSERT INTO veiculo(marca, modelo, ano, direcao, ar_condicionado, 
					air_bag, alarme, banco_couro, som, travas, piloto_automatico, outro) VALUES
					('{$marca}', '{$modelo}', {$ano}, '{$dh}', '{$ac}', '{$ab}', '{$al}', '{$bc}', '{$sm}', '{$tv}', '{$pa}', 'TESTE')";
					mysqli_query($conexao, $query);
					mysqli_close($conexao);
					?>
					<p class="sucesso">veículo inserido com sucesso</p>
					<?php
				} else {
					if(empty($marca)||empty($modelo)||empty($ano)){
						?>
						<p class="erro">O preenchimento dos campos marca, modelo e ano são obrigatórios</p>
						<?php
					} else if(!$verifica) {
						?>
						<p class="erro">O veículo precisa ter no mínimo um opcional selecionado</p>
						<?php
					} else if(!$verificaOutro){
						?>
						<p class="erro">O preenchimento do campo outro é obrigatório quando selecionado</p>
						<?php
					} else if(strlen($outro) < 2){
						?>
						<p class="erro">Campo outro precisa de no mínimo duas letras</p>
						<?php
					}
				}
			}					
		?>		
		<div class="externa">
			<div class="cabecalho">
				<h2>CADASTRO DE VEÍCULOS</h2>
			</div>
			<div class="div_form" >
				<form action=""  method="post" id="form">
				<div style="width: 100%;float:left; margin-bottom: 5px;"> 
					<div style="float:left;">
						Marca:
						<select id="marcas" name="marcas">
							<option value="selecione"></option>
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="fiat">Fiat</option>
							<option value="audi">Audi</option>
							<option value="audi">Chevrolet</option>
						</select>
					</div>
					<div style="display: none; " id="msg_marca" class="mensagem_erro">Preenchimento Obrigatório</div>
				</div>
				<div style="float:left; margin-bottom: 5px;width: 100%;">
					<div style="position:relative;float:left;">
						Modelo:
						<input name="modelo" id="modelo" type="text" >
					</div>	
					<div style="display: none;" id="msg_modelo" class="mensagem_erro">Preenchimento Obrigatório</div>
				</div>
				<div style="float:left; margin-bottom: 5px;width: 100%;">
					<div style="position:relative;float:left;">
						Ano:
						<input name="ano" id="ano" type="text" >
					</div>	
					<div style="display: none;" id="msg_ano" class="mensagem_erro">Valor Inválido</div>
				</div>
				<div style="float:left">
					<fieldset style="width: 200px">
						<legend>Opcionais</legend>
						<input type="checkbox" name="dh" id="dh" value="dh">
						Direção Hidraulica
						<br>
						<input type="checkbox" name="ac" id="ac">
						Ar Condicionado
						<br>
						<input type="checkbox" name="ab" id="ab">
						Air Bag
						<br>
						<input type="checkbox" name="al" id="al">
						Alarme
						<br>
						<input type="checkbox" name="bc" id="bc">
						Banco de Couro
						<br>
						<input type="checkbox" name="sm" id="sm">
						Som
						<br>
						<input type="checkbox" name="tv" id="tv">
						Travas
						<br>
						<input type="checkbox" name="pa" id="pa">
						Piloto Automático
						<br>
						<input type="checkbox" name="ot" id="ot">
						Outro
						<input type="text" name="outro" id="outro" style="width:100px;">
						<div style="display: none;" id="msg_outro" class="mensagem_erro">Preencher o campo outro!!</div>
						<div style="display: none;" id="msg_opcionais" class="mensagem_erro">Informar ao menos 1 opcional!!</div>
					</fieldset>
					</div>
					<div style="padding-top: 250;">
					<input type="submit" name="cadastro" value="Cadastrar"> <br>
					<input type="button" value="Listar todos os cadastros" >
					</div>
				</form>
			</div>
		</div>
	</body>
</html>