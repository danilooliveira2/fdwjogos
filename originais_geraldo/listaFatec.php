<html>
	<body>
		<center>
			<h3>Registros da tabela pessoas</h3>
			<table border =3>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Data de Nascimento</th>
				</tr>
			<?php
				include('conectaFatec.php');

				$operacao = $_GET['operacao'];

				$sql = "SELECT * FROM pessoas";
				if ($result = $conexao->query($sql)) {

				    /* fetch associative array */
				    while ($row = $result->fetch_assoc()) {
			?>
						<tr>
							<td><?php  echo $row["id"]; ?></td>
							<td><?php  echo $row["nome"]; ?></td>
							<td><?php  echo $row["dtNasc"]; ?></td>
						</tr>
			<?php	
					}
				if ($operacao != null){
						if($operacao == 'Inserir'){
			?>
								<tr>
									<td colspan="3">Registro Inserido com sucesso </td>
								</tr>
			<?php
						}
					}
				}

	
				
				$conexao->close();
		
			?>
			</table>
		</center>
	</body>
</html>
