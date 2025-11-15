<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "pi_32";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Erro ao conectar ao banco: " . $conexao->connect_error);
}
?>