<?php
include('conexao.php');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nomeusuario = trim($_POST['nomeusuario']);
    $email = trim($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $check = $conexao->prepare("SELECT * FROM usuarios WHERE nomeusuario = ? OR email = ?");
    $check->bind_param("ss", $nomeusuario, $email);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Usuário ou email já cadastrados!'); history.back();</script>";
        exit;
    }

    $insert = $conexao->prepare("INSERT INTO usuarios (nomeusuario, email, senha) VALUES (?, ?, ?)");
    $insert->bind_param("sss", $nomeusuario, $email, $senha);

    if ($insert->execute()) {
        echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . $conexao->error . "'); history.back();</script>";
    }
    $conexao->close();
}
?>