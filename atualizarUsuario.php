<?php

require("conexao.php");

if (isset($_POST['atualizar'])) {
    $idusuario = $_POST['idusuario'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $atualizar = "UPDATE usuario SET nome = '$nome', email = '$email' WHERE idusuario = '$idusuario'";

    if (mysqli_query($conexao, $atualizar)) {
        echo "
        <script>
            alert('Dados atualizado com sucesso');
            window.location='atualizar.php';
        </script>";
        exit();
    } else {
        echo "Erro ao atualizar" . mysqli_error($conexao);
    }
}

$editaUsuario = null;

if (isset($_GET['editar'])) {

    $idEditar = $_GET['editar'];

    $resultado = mysqli_query(
        $conexao,
        "SELECT * FROM usuario WHERE idusuario = $idEditar"
    );

    $editaUsuario = mysqli_fetch_assoc($resultado);
}

$alunos = mysqli_query(
    $conexao,
    "SELECT * FROM usuario"
);


if (isset($_GET['apagar'])) {
    $idusuario = $_GET['apagar'];

    $deletar = "DELETE FROM usuario WHERE idusuario = $idusuario";

    if (mysqli_query($conexao, $deletar)) {
        echo "
        <script>
            alert('Dado excluido com sucesso!');
            window.location='atualizar.php';
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
    <title>Atualizar Usuários</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background-color: #0d6efd;">

    <main class="container min-vh-100 d-flex justify-content-center align-items-center p-8">
        <div class="card shadow-sm w-100" style="max-width: 948px; padding: 25px;">
            <div class="card-body p-50"></div>
            <h1 class="text-center text-primary">Atualização de Usuários</h1>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    require("conexao.php");

                    $consulta = "SELECT * FROM usuario";
                    $usuario = mysqli_query($conexao, $consulta);

                    while ($array = mysqli_fetch_assoc($usuario)) {
                        ?>

                        <tr>
                            <td>
                                <?= $array['idusuario'] ?>
                            </td>
                            <td>
                                <?= $array['nome'] ?>
                            </td>
                            <td>
                                <?= $array['email'] ?>
                            </td>

                            <td>
                                <a href="?editar=<?= $array['idusuario'] ?>" class="btn btn-primary">Editar</a>
                                <a href="?apagar=<?= $array['idusuario'] ?>" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza que deseja excluir?')">Apagar</a>
                            </td>
                        </tr>


                    <?php } ?>

                </tbody>

                <div class="card shadow-sm w-100" style="max-width: 948px; padding: 25px;">
                    <div class="card-body p-50"></div>
                    <?php if ($editaUsuario): ?>
                        <h3>Editar Usuário</h3>

                        <form method="POST">
                            <input type="hidden" name="id_matricula" value="<?= $editaUsuario['idusuario'] ?>">

                            <label for="">Nome: </label>
                            <input type="text" name="nome" class="form-control" value="<?= $editaUsuario['nome'] ?>">

                            <label for="">Curso: </label>
                            <input type="text" name="curso" class="form-control" value="<?= $editaUsuario['email'] ?>">
                            <br>
                            <br>
                            <div>
                                <a href="?editar=<?= $array['idusuario'] ?>" class="btn btn-primary">Editar</a>
                                <button type="submit" name="atualizar" class="btn btn-info">Atualizar</button>
                                <a href="atualizarUsuario.php" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    <?php endif; ?>
                </div>
            </table>

            <div class="container justify-content-left align-items-left">

                <a href="painel.php" class="btn btn-primary">Voltar</a>

            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
        </script>
</body>

</html>