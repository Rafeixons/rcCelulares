<?php
//Conectar ao banco de dados
$conexao = mysqli_connect(
    "localhost",
    "root",
    "",
    "rcCelulares",
    3307
);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Configura caracteres especiais
mysqli_set_charset( $conexao,"utf8");


?>