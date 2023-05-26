<html>
	<body>
		<?php
			include('conectaFatec.php');

			$nome = $_POST['nome'];

			$dtNasc = $_POST['dtNasc'];

			$obs = $_POST['obs'];

			$sql = "insert into pessoas (nome, dtNasc, obs, dtRegistro) values ( '$nome','$dtNasc', '$obs', curdate())";
			
			if ($conexao->query($sql) === TRUE) {
			  echo "Registro inserido com sucesso";
			} else {
			  echo "Erro: " . $sql . "<br>" . $conexao->error;
			}

			$conexao->close();
			// ver o resto no w3schools
			header('Location: listaFatec.php?operacao=Inserir');
		?>
	</body>
</html>
