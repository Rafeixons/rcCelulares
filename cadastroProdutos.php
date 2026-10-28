<?php

require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_produto = trim($_POST['nome_produto']);
    $preco = trim($_POST['preco']);

    $sql = "
INSERT INTO produtos
(nome_produto, preco)
VALUES
(?,?)
";

    $stmt = mysqli_prepare(
        $conexao,
        $sql
    );

    mysqli_stmt_bind_param(
        $stmt,
        "ss",
        $nome_produto,
        $preco,
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
                    Produtos:
                </h2>

                <form action="" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nome do Produto:</label>

                        <input type="text" name="nome_produto" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Preço:</label>

                        <input type="number" name="preco" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Criar Produto
                    </button>



                    <a href="atualizarProdutos.php"  class="btn btn-primary"> Voltar</a>

                </form>
            </div>

        </div>

    </main>

</body>

</html>