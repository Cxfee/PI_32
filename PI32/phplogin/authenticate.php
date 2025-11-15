<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$nomeusuario = isset($_POST['nomeusuario']) ? trim($_POST['nomeusuario']) : '';
$senha = isset($_POST['senha']) ? trim($_POST['senha']) : '';

if (empty($nomeusuario) || empty($senha)) {
    echo "<script>alert('Preencha todos os campos!'); history.back();</script>";
    exit;
}

$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE nomeusuario = ?");
$stmt->bind_param("s", $nomeusuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();

    // Verifica a senha criptografada com password_verify
    if (password_verify($senha, $usuario['senha'])) {
        // Cria as variáveis de sessão necessárias
        $_SESSION['id'] = $usuario['id'];
        $_SESSION['nomeusuario'] = $usuario['nomeusuario'];

        header('Location: ../phpresenha/resenha.php');
        exit;
    } else {
        echo "<script>alert('Senha incorreta!'); window.location='login.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Usuário não encontrado!'); window.location='login.php';</script>";
    exit;
}
?>