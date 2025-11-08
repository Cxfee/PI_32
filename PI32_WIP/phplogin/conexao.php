<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "meu_banco";

$conexao = new mysqli($servidor, $usuario, $senha, $banco);
if ($conexao->connect_error) {
    die("Erro ao conectar ao banco: " . $conexao->connect_error);
}
?>