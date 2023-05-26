<?php

    // Verificar se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obter os valores enviados do formulário
        $login = $_POST["login"];
        $senha = md5($_POST["senha"]); // Converter a senha para MD5

        // Criar a conexão com o banco de dados
        $conexao = new mysqli("mysql25-farm10.kinghost.net", "microvip34", "Jogos2023Danilo", "microvip34");

        // Verificar se houve um erro na conexão
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }

        // Consultar o banco de dados para verificar se o login e a senha estão corretos
        $sql = "SELECT * FROM USUARIOS WHERE login = '$login' AND senha = '$senha'";
        $resultado = $conexao->query($sql);

        // Verificar se a consulta retornou algum resultado
        if ($resultado->num_rows == 1) {
            // Login e senha estão corretos, redirecionar para a tela principal
            header("Location: principal.php");
            exit();
        } else {
            // Login e senha estão incorretos, exibir mensagem de erro
            echo "Login e/ou senha incorretos.";
        }

        // Fechar a conexão com o banco de dados
        $conexao->close();
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Sistema Fatec PHP Jogos</title>
    <meta charset="utf-8">
</head>
<body>
    <center>
        <h2>Bem vindo ao sistema Fatec!</h2>

        <form method="post" action="login.php">
            <table>
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <td>Senha:</td>
                    <td><input type="password" name="senha"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Logar">
                    </td>
                </tr>

 

            </table>
        </form>
    </center>
</body>
</html>