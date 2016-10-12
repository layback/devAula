<html>
		<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<script src="js/validaDados.js"></script>
		<script src="js/jquery-3.1.1.min.js"></script>
	</head>
	<body>		
		<div class="externa_tela_cheia">
			<div class="cabecalho_tela_cheia">
				<h2>VEÍCULOS CADASTRADOS</h2>
			</div>
			
			<?php			
				$conexao = mysqli_connect('localhost', 'root', '', 'locadoraveiculos');	
				$veiculos = array();
				$resultado = mysqli_query($conexao, "select * from veiculo");
				while($veiculo = mysqli_fetch_assoc($resultado)){
					array_push($veiculos, $veiculo);
				}
			?>
			
			<table style="width:100%">
				<tr>
					<th>Marca</th>
					<th>Modelo</th> 
					<th>Ano</th>
					<th>Dir.Hid</th>
					<th>Ar Cond</th>
					<th>Air Bag</th>
					<th>Alarme</th>
					<th>Banco Couro</th>
					<th>Som</th>
					<th>Travas</th>
					<th>Piloto</th>
					<th>Outro</th>
				</tr>			
				<?php
					foreach($veiculos as $veiculo){
				?>
				<tr>
					<td class="coluna"><?= $veiculo['marca'] ?></td>
					<td class="coluna"><?= $veiculo['modelo'] ?></td>
					<td class="coluna"><?= $veiculo['ano'] ?></td>
					<td class="coluna"><?= $veiculo['direcao'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['ar_condicionado'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['air_bag'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['alarme'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['banco_couro'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['som'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['travas'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['piloto_automatico'] == 'S' ? 'X' : '' ?></td>
					<td class="coluna"><?= $veiculo['outro'] ?></td>
				</tr>
				<?php
					}
				?>
			</table>
		</div>
	</body>
</html>