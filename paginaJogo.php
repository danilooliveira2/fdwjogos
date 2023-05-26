<?php

session_start();

if (isset($_SESSION["id"])){
    $nome = $_SESSION["nome"];
    $id = $_SESSION["id"];
}else {
    header("Location: index.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Jogos</title>
</head>

<body style="font-family: 'Roboto'">
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <p>Olá <?php  echo $nome ?> , seja bem-vindo. Escolha seu jogo favorito e inicie a partida agora mesmo:</p>
            </div>
            <br>
            <br>
        </div>

        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card">
                    <img src="imagens/jogo.webp" class="card-img-top" alt="Imagem do Jogo">
                    <div class="card-body">
                        <h5 class="card-title">Título do seu Jogo</h5>
                        <p class="card-text"></p>
                    </div>
                    <div class="card-footer text-center">
                        <a href="jogo.php" class="btn btn-primary">Jogar Agora</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>