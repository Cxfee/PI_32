<?php
session_start();
include('../phplogin/conexao.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: resenha.php');
    exit;
}

if (!isset($_SESSION['id'])) {
    echo "<script>alert('Você precisa estar logado para enviar uma resenha.'); window.location='../phplogin/login.php';</script>";
    exit;
}

$id_usuario = $_SESSION['id'];
$nomeproduto = isset($_POST['nomeproduto']) ? trim($_POST['nomeproduto']) : '';
$tipoproduto = isset($_POST['tipoproduto']) ? trim($_POST['tipoproduto']) : '';
$precoproduto = isset($_POST['precoproduto']) ? floatval($_POST['precoproduto']) : 0.00;
$resenha = isset($_POST['resenha']) ? trim($_POST['resenha']) : '';

if (empty($nomeproduto) || empty($tipoproduto) || empty($resenha)) {
    echo "<script>alert('Preencha todos os campos obrigatórios.'); history.back();</script>";
    exit;
}

// Insere a resenha no banco
$stmt = $conexao->prepare("INSERT INTO resenhas (nomeproduto, tipoproduto, precoproduto, resenha, id_usuario) VALUES (?, ?, ?, ?, ?)"); 
if (!$stmt) {
    echo "<script>alert('Erro no banco: ". addslashes($conexao->error) ."'); history.back();</script>";
    exit;
}
$stmt->bind_param("ssdsi", $nomeproduto, $tipoproduto, $precoproduto, $resenha, $id_usuario);

if ($stmt->execute()) {
    // Redireciona para página de sucesso com dados mínimos na query (seguro o bastante para este contexto)
    header("Location: resenha-sucesso.php?id=" . $conexao->insert_id);
    exit;
} else {
    echo "<script>alert('Erro ao salvar resenha: ". addslashes($stmt->error) ."'); history.back();</script>";
    exit;
}
?>
