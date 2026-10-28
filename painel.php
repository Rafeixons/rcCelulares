<?php

session_start();

if (!isset($_SESSION['idusuario'])) {
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel - RC Celulares</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-primary">
        <div class="container">

            <span class="navbar-brand">
                RC Celulares
            </span>

            <a href="logout.php" class="btn btn-outline-light">
                Sair
            </a>

        </div>
    </nav>

    <main class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">

                <h3>
                    Painel do Usuário
                </h3>

            </div>

            <div class="card-body">

                <h4>
                    Bem-vindo,
                    <?php echo $_SESSION['nome']; ?>
                </h4>

                <hr>

                <p>
                    <strong>ID:</strong>
                    <?php echo $_SESSION['idusuario']; ?>
                </p>

                <p>
                    <strong>Nome:</strong>
                    <?php echo $_SESSION['nome']; ?>
                </p>

                <p>
                    <strong>E-mail:</strong>
                    <?php echo $_SESSION['email']; ?>
                </p>

                <p>
                    <strong>Perfil:</strong>
                    <?php echo ucfirst($_SESSION['perfil']); ?>
                </p>

                <a href="index.html" class="btn btn-outline-primary">
                    Voltar ao site
                </a>

            </div>

        </div>

        <?php if ($_SESSION['perfil'] == 'administrador'): ?>

            <div class="card shadow mt-4">

                <div class="card-header bg-success text-white">

                    Área Administrativa

                </div>

                <div class="card-body d-flex-center">

                    <a href="atualizarUsuario.php" class="btn btn-success">
                        Gerenciar Usuários
                    </a>

                    <a href="atualizarProdutos.php" class="btn btn-primary">
                        Gerenciar Produtos
                    </a>


                </div>

                <a href="logout.php" class="btn btn-primary">
                    Sair
                </a>

            </div>



        <?php endif; ?>

    </main>

</body>

</html>