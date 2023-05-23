<?php

require_once "conexao.php";

$mensagem = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os valores enviados do formulário
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]); // Converter a senha para MD5

    // Consultar no banco
    $sql = "SELECT * FROM USUARIOS WHERE login = '$login' AND senha = '$senha'";

    $resultado = $conexao->query($sql);

    // Verificar se a consulta retornou algum resultado positivo
    if ($resultado->num_rows == 1) {


        //ETAPA 2 {
        session_start();
        $_SESSION["nome"] = $nomeUsuario; // Substitua pelo nome do usuário obtido
        $_SESSION["id"] = $idUsuario; // Substitua pelo ID do usuário obtido
        //FIM ETAPA2 }


        // Se retornou, é porque Login e senha estão corretos
        header("Location: principal.php");
        exit();
    } else {
        // Se não retornou, login ou senha inválido
        $mensagem = "Login ou senha inválidos.";
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Sistema Fatec PHP Jogos</title>
    <meta charset="utf-8">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
    <style>
        body {
            background-image: url('imagens/wallpaper.png');
            /* Substitua URL_DA_IMAGEM pela URL do wallpaper online */
            background-size: cover;
            background-color: rgba(0, 0, 0, 0.5); /* Ajuste o valor do alpha (0.5) para alterar a intensidade do escurecimento */

        }
    </style>


</head>

<body class="bg-dark">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-5">
                <div class="card bg-white bg-opacity-75">
                    <div class="card-body">
                        <h2 class="text-center">Bem-vindo a</h2>
                        <h2 class="text-center mb-4">Fatec Jogos Digitais</h2>

                        <form method="post" action="index.php" class="mt-4">
                            <div class="mb-3">
                                <label for="login" class="form-label">Login</label>
                                <input type="text" name="login" id="login" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <a href="cadastro.php" class="text-gray-600 text-decoration-none fw-bold fs-7 text-secondary" >
                                Ainda não tenho cadastro</a>
                        </div>
                        <?php if ($mensagem) { ?>
                            <div class="card-footer text-muted mt-2 pt-3 mb-0 pb-0">
                                <p class="text-danger font-weight-bold text-center fw-bold"><?php echo $mensagem; ?></p>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
</body>


</html>