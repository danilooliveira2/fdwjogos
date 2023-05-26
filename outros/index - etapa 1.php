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
</head>

<body style="font-family: 'Roboto'">
    <center>
        <h2>Bem-vindo ao sistema Fatec!</h2>

        <form method="post" action="index.php"> <!-- INDEX e não login -->
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
                        <input type="submit" value="Entrar" style="padding: 8px; margin-top: 10px; margin-bottom: 10px;">
                    </td>
                </tr>

                <tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="cadastro.php" style="color: Gray; text-decoration: none;">
                            Ainda não tenho cadastro</a>
                    </td>
                </tr>

                </tr>


                <tr>
                    <td colspan="2" style=" text-align: center; padding-top: 20px; color: #751346; font-weight: bold;"><?php echo $mensagem; ?></td>
                </tr>


            </table>
        </form>
    </center>
</body>

</html>