<?php
session_start();
include('../phplogin/conexao.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: resenha.php');
    exit;
}

$nomeproduto = isset($_POST['nomeproduto']) ? trim($_POST['nomeproduto']) : '';
$tipoproduto = isset($_POST['tipoproduto']) ? trim($_POST['tipoproduto']) : '';
$precoproduto = isset($_POST['precoproduto']) ? floatval($_POST['precoproduto']) : 0.00;
$resenha = isset($_POST['resenha']) ? trim($_POST['resenha']) : '';

if (empty($nomeproduto) || empty($tipoproduto) || empty($resenha)) {
    echo "<script>alert('Preencha todos os campos obrigatórios.'); history.back();</script>";
    exit;
}

$stmt = $conexao->prepare("INSERT INTO resenhas (nomeproduto, tipoproduto, precoproduto, resenha) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    echo "<script>alert('Erro no banco: ". addslashes($conexao->error) ."); history.back();</script>";
    exit;
}
$stmt->bind_param("ssds", $nomeproduto, $tipoproduto, $precoproduto, $resenha);
if ($stmt->execute()) {
    header('Location: resenha.php');
    exit;
} 
else {
    echo "<script>alert('Erro ao salvar resenha: ". addslashes($stmt->error) ."); history.back();</script>";
    exit;
}
?>
