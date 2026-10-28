<?php

require("conexao.php");

if (isset($_POST['atualizar'])) {
    $id_produto = $_POST['id_produto'];
    $nome_produto = $_POST['nome_produto'];
    $preco = $_POST['preco'];

    $atualizar = "UPDATE produtos SET nome_produto = '$nome_produto', preco = '$preco' WHERE id_produto = '$id_produto'";

    if (mysqli_query($conexao, $atualizar)) {
        echo "
        <script>
            alert('Dados atualizado com sucesso');
            window.location='atualizarProdutos.php';
        </script>";
        exit();
    } else {
        echo "Erro ao atualizar" . mysqli_error($conexao);
    }
}

$editaProduto = null;

if (isset($_GET['editar'])) {

    $idEditar = $_GET['editar'];

    $resultado = mysqli_query(
        $conexao,
        "SELECT * FROM produtos WHERE id_produto = $idEditar"
    );

    $editaProduto = mysqli_fetch_assoc($resultado);
}

$alunos = mysqli_query(
    $conexao,
    "SELECT * FROM produtos"
);


if (isset($_GET['apagar'])) {
    $id_produto = $_GET['apagar'];

    $deletar = "DELETE FROM produtos WHERE id_produto = $id_produto";

    if (mysqli_query($conexao, $deletar)) {
        echo "
        <script>
            alert('Dado excluido com sucesso!');
            window.location='atualizarProdutos.php';
        </script>";
        exit();
    } else {
        echo "Erro ao deletar." . mysqli_error($conexao);
    }
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #0d6efd;">

    <main class="container min-vh-100 d-flex justify-content-center align-items-center p-8">
        <div class="card shadow-sm w-100" style="max-width: 948px; padding: 25px;">
            <div class="card-body p-50"></div>
            <h1 class="text-center text-primary">Atualização de Produtos</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome do Produto</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require("conexao.php");

                    $consulta = "SELECT * FROM produtos";
                    $produto = mysqli_query($conexao, $consulta);

                    while ($array = mysqli_fetch_assoc($produto)) {
                        ?>

                        <tr>
                            <td>
                                <?= $array['id_produto'] ?>
                            </td>
                            <td>
                                <?= $array['nome_produto'] ?>
                            </td>
                            <td>
                                <?= $array['preco'] ?>
                            </td>

                            <td>
                                <a href="?editar=<?= $array['id_produto'] ?>" class="btn btn-primary">Editar</a>
                                <a href="?apagar=<?= $array['id_produto'] ?>" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">Apagar</a>
                            </td>
                        </tr>


                    <?php } ?>

                </tbody>

                <div class="card shadow-sm w-100" style="max-width: 948px; padding: 25px;">
                    <div class="card-body p-50"></div>
                    <?php if ($editaProduto): ?>
                        <h3>Editar Produto</h3>

                        <form method="POST">
                            <input type="hidden" name="id_produto" value="<?= $editaProduto['id_produto'] ?>">

                            <label for="">Nome do Produto: </label>
                            <input type="text" name="nome_produto" class="form-control" value="<?= $editaProduto['nome_produto'] ?>">

                            <label for="">Curso: </label>
                            <input type="text" name="preco" class="form-control" value="<?= $editaProduto['preco'] ?>">
                            <br>
                            <br>
                            <div>
                                <a href="?editar=<?= $array['id_produto'] ?>" class="btn btn-primary">Editar</a>
                                <button type="submit" name="atualizar" class="btn btn-info">Atualizar</button>
                                <a href="atualizarProduto.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </table>

            <div class="container justify-content-left align-items-left">

                <a href="painel.php" class="btn btn-primary">Voltar</a>
                <a href="cadastroProdutos.php" class="btn btn-primary">Cadastrar Produtos</a>

            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
</body>

</html>