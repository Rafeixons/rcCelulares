<?php

session_start();

require_once("conexao.php");

// Verifica se os campos foram enviados
if (!isset($_POST['email']) || !isset($_POST['senha'])) {
    header("Location: login.php?erro=1");
    exit();
}

$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

// Busca o usuário pelo email
$sql = "SELECT * FROM usuario WHERE email = ?";

$stmt = mysqli_prepare($conexao, $sql);

mysqli_stmt_bind_param($stmt, "s", $email);

mysqli_stmt_execute($stmt);

$resultado = mysqli_stmt_get_result($stmt);

// Verifica se encontrou o usuário
if (mysqli_num_rows($resultado) === 1) {

    $usuario = mysqli_fetch_assoc($resultado);

    // Verifica a senha
    if (password_verify($senha, $usuario['senha_hash'])) {

        // Cria as sessões
        $_SESSION['idusuario'] = $usuario['idusuario'];
        $_SESSION['nome'] = $usuario['nome'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['perfil'] = $usuario['perfil'];

        // Redireciona para o painel
        header("Location: painel.php");
        exit();
    }
}

// Login inválido
header("Location: login.php?erro=1");
exit();