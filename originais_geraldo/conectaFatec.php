<!-- <html>
	<body> -->
		<?php

			// $conexao = new mysqli("localhost","root","root","fatec");
			$conexao = new mysqli("mysql25-farm10.kinghost.net","microvip34","Jogos2023Danilo","microvip34");
			
			// Verifica se a conexão foi bem sucedida. Em caso de erro, exibe uma mensagem
			if ($conexao->connect_error) {
				die("Connection failed: " . $conexao->connect_error);
			  }
		?>
	<!-- </body>
</html> -->
