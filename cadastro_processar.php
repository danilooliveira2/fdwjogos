<?php

require_once("conexao.php");
$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $datanasc = $_POST["datanasc"];
    $login = $_POST["login"];
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $sqlConsultaLogin = "SELECT * FROM USUARIOS WHERE login = '$login' ";
    $resultaLogin = $conexao->query($sqlConsultaLogin);

    if ($resultaLogin->num_rows > 0) {
        $mensagem = "Login já existente. Por favor, escolha outro nome de usuário.";
    } else {

        $sqlCadastro = "INSERT INTO USUARIOS (nome, email, login, senha, data_nascimento) 
                    VALUES ( '$nome', '$email', '$login', '$senha', '$datanasc' ) ";

        $resultaCadastro = $conexao->query($sqlCadastro);

        if ($resultaCadastro === true) {
            $mensagem = "SUCESSO";
        } else {
            $mensagem = "Erro ao cadastrar usuário. Por favor, tente novamente.";
        }
    }
}

$conexao->close();

header("Location: cadastro.php?mensagem=" . urlencode($mensagem));


?>

