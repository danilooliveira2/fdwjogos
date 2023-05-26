<?php

require_once "../conexao.php";

$mensagem = "";

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obter os valores enviados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $dataNasc = $_POST["datanasc"];
    $login = $_POST["login"];
    $senha = md5($_POST["senha"]); // Converter a senha para MD5


    // Realizar as validações necessárias
    

    // Verificar se o e-mail já está cadastrado
    $sql = "SELECT * FROM USUARIOS WHERE email = '$email'";
    
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        
        $mensagem = "O e-mail informado já está cadastro em nosso sistema. ";

    } else {
        // Inserir os dados no banco de dados
        $sql = "INSERT INTO USUARIOS (nome, email, login, senha, data_nascimento)
                 VALUES ('$nome', '$email', '$login', '$senha', '$dataNasc' )";

        if ($conexao->query($sql) === true) {
            $mensagem = "SUCESSO";
        } else {
            $mensagem = "Erro ao cadastrar. Por favor, tente novamente.";
        }
    }
}

// Fechar a conexão com o banco de dados
$conexao->close();

// Redirecionar para a página de cadastro com a mensagem de erro ou sucesso
header("Location: cadastro_login.php?mensagem=" . urlencode($mensagem));
exit();

?>
