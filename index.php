<?php


require_once("conexao.php");
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $login = $_POST["login"];
    $senha =  md5( $_POST["senha"] ) ;  //  $_POST["senha"];


    $sql = "SELECT * FROM USUARIOS WHERE login = '$login' AND senha = '$senha' ";

    $resultado = $conexao->query($sql);

    if ($resultado->num_rows == 1) {

        //Obter os dados do resultado da consulta referente a próxima linha de leitura
        $row = $resultado->fetch_assoc();

        session_start();
        $_SESSION["nome"] = $row["nome"];
        $_SESSION["id"] = $row["id_usuario"];

        header("Location: paginaJogo.php");
        exit();
    } else {
        $mensagem = "Login ou senha inválido.";
    }

    $conexao->close();
}


?>



<!DOCTYPE html>
<html>

<head>
    <title>Sistema Fatec PHP Jogos</title>
    <meta charset="utf-8">


    <!-- IMPORTACAO DO BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>
        body {
            background-image: url('imagens/wallpaper.png');
            background-size: cover;
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
                            <a href="cadastro.php" class="text-gray-600 text-decoration-none fw-bold fs-7 text-secondary">
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