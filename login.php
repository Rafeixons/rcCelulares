<?php

session_start();

// Verifica se já está logado
if (isset($_SESSION["idusuario"])) {
    header("Location: painel.php");
    exit();
}

// Verifica se existe o parâmetro erro na URL
$erro = isset($_GET["erro"]);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <main class="container min-vh-100 d-flex
                 justify-content-center align-items-center">
        <div class="card shadow-sm w-100" style="max-width: 420px;">
            <div class="card-body p-4">
                <!-- Mostra erro se o login estiver incorreto -->

                <?php if ($erro): ?>

                    <div class="alert alert-danger">
                        E-mail ou senha inválidos.
                    </div>
                <?php endif; ?>

                <div class="row ">
                    <div class="col">

                    <h2>
                        Login
                    </h2>
                        <form action="autenticar.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" aria-describedby="emailHelp">
                                <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais
                                    ninguém.</div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Senha</label>
                                <input type="password" class="form-control" name="senha">
                            </div>

                            <!-- Botão Entrar -->
                            <button type="submit" class="btn btn-outline-primary">
                                Entrar
                            </button>
                            
                                <a href="cadastroUsuario.php" class="btn btn-outline-primary">
                                    Cadastre-se
                                </a>
                                <a href="index.html" class="btn btn-outline-primary">
                                    Voltar ao site
                                </a>
                            
                        </form>
                        <!-- Voltar ao site -->

                    </div>
                </div>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>