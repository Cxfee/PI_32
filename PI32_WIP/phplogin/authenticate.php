<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomeusuario = trim($_POST['nomeusuario']);
    $senha = $_POST['senha'];

    $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE nomeusuario = ?");
    $stmt->bind_param("s", $nomeusuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        if (password_verify($senha, $usuario['senha'])) {
            $_SESSION['account_loggedin'] = true;
            $_SESSION['nomeusuario'] = $usuario['nomeusuario'];
            header('Location: ../phpresenha/resenha.php');
            exit;
        } else {
            echo "<script>alert('Senha incorreta!'); history.back();</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!'); history.back();</script>";
    }

    $conexao->close();
}
?>