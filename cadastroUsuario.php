<?php

require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar_senha'];

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];
    $confirmar = $_POST['confirmar_senha'];

    if ($senha != $confirmar) {

        die("As senhas não coincidem.");

    }

    $senhaHash = password_hash(
        $senha,
        PASSWORD_DEFAULT
    );

    $sql = "
INSERT INTO usuario
(nome,email,senha_hash)
VALUES
(?,?,?)
";

    $stmt = mysqli_prepare(
        $conexao,
        $sql
    );

    mysqli_stmt_bind_param(
        $stmt,
        "sss",
        $nome,
        $email,
        $senhaHash
    );
    mysqli_stmt_execute($stmt);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <main class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div class="card shadow w-100" style="max-width:450px;">

            <div class="card-body p-4">

                <h2 class="text-primary mb-4">
                    Criar Conta
                </h2>

                <form action="" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>

                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>

                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Senha</label>

                        <input type="password" name="senha" class="form-control" minlength="6" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Confirmar Senha
                        </label>

                        <input type="password" name="confirmar_senha" class="form-control" minlength="6" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Criar Conta
                    </button>

                </form>

                <a href="login.php" class="d-block mt-3">
                    Já possui conta? Fazer login
                </a>

            </div>

        </div>

    </main>

</body>

</html>