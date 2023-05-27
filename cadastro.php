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


</head>

<body>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card bg-white bg-opacity-75">
                    <div class="card-body">


                        <?php
                        if (isset($_GET["mensagem"]) && $_GET["mensagem"] == "SUCESSO") {
                        ?>

                            <div class="alert alert-success"  role="alert">
                                Cadastro realizado com sucesso!!
                            </div>

                        <?php
                        } else {
                        ?>


                            <h2 class="text-center">Cadastro de Usuário</h2>

                            <form method="post" action="cadastro_processar.php" class="mt-4">

                                <div class="mb-3">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" id="nome" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="email">E-mail</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="datanasc">Data de Nascimento</label>
                                    <input type="date" name="datanasc" id="datanasc" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="login">Nome de Usuário (login)</label>
                                    <input type="text" name="login" id="login" class="form-control">
                                </div>


                                <div class="mb-3">
                                    <label for="senha">Senha</label>
                                    <input type="password" name="senha" id="senha" class="form-control">
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>

                                <?php

                                if (isset($_GET["mensagem"])) {   ?>

                                    <div class="alert alert-danger mt-3" role="alert">
                                        <?php echo $_GET["mensagem"]; ?>
                                    </div>

                                <?php
                                }
                                ?>

                            </form>

                        <?php
                        }
                        ?>

                        <div class="text-center mt-3">
                            <a href="index.php" class="text-primary text-decoration-none fw-bold">Voltar para o Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- INCLUSOES PARA DATA PICKER -->

    <!-- Inclua o jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Inclua o Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>


    <script>
        $(function() {
            // Inicializa o Datepicker
            $(".datepicker").datepicker();
        });
    </script>

</body>

</html>