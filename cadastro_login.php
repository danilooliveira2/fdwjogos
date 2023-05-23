<!DOCTYPE html>
<html>

<head>
    <title>Cadastro - Sistema Fatec PHP Jogos</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">


    <style>
        body {
            background-image: url('imagens/wallpaper.png');
            background-size: cover;
        }
    </style>




    <!-- INCLUSOES PARA DATA PICKER -->

    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Inclua o Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>



</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card bg-white bg-opacity-75">
                    <div class="card-body">

                        <?php

                        // $retorno = "";
                        // if (isset($_GET['mensagem'])) {
                            $retorno = $_GET['mensagem'];
                        // }

                        //MENSAGEM DE ERRO 
                        if (isset($retorno) && $retorno == "sucesso") { ?>

                            <div id="mensagem-sucesso" class="alert alert-success">Cadastro realizado com sucesso!</div>
                        <?php

                            
                            //REALIZAR O CADASTRO
                        } else {  ?>

                            <h2 class="text-center">Cadastro de Usuário</h2>
                            <form method="post" action="cadastro_processar.php" class="mt-4">
                                <div class="mb-3">
                                    <label for="nome" class="form-label ">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="dt_nasc" class="form-label">Data de Nascimento</label>
                                    <input type="date" name="dt_nasc" id="dt_nasc" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="login" class="form-label ">Login</label>
                                    <input type="text" name="login" id="login" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="senha" class="form-label ">Senha</label>
                                    <input type="password" name="senha" id="senha" class="form-control">
                                </div>

                                <div class="text-center">
                                        <button type="submit" class="btn btn-warning btn-round p-2">Realizar Cadastro</button>
                                </div>

                                <?php if (isset($retorno)) { ?>
                                    <div id="mensagem-warning" class="alert alert-warning mt-3">
                                        <?php echo $retorno; ?>
                                    </div>
                                <?php } ?>



                            </form>




                        <?php
                        }
                        ?>


                        <div class="text-center mt-3">
                            <a href="index.php" class="text-primary text-decoration-none fw-bold">Voltar para o login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            // Inicializa o Bootstrap Datepicker
            $(".datepicker").datepicker();
        });
    </script>

</body>

</html>