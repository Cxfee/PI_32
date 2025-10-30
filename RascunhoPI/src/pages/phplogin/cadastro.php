<?php
session_start();
if (isset($_SESSION['account_loggedin'])) {
	header('Location: home.php'); 
	exit;
}
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
        <link rel="stylesheet" href="../../..//public/css/fonts.css">
        <link rel="stylesheet" href="../../..//public/css/global.css">
        <link rel="stylesheet" href="cadastro.css">
        <link rel="stylesheet" href="../home/index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Criar Conta</title>
	</head>
    <body> 
                

            <div class="login">
                <h2> Crie uma conta </h2>
                <form action="cadastro-processo.php" method="post" class="form login-form">

                    <label class="form-label" for="nomeusuario">Nome de Usuário</label>
                    <input class="form-input" type="text" name="nomeusuario" placeholder="Nome de Usuário" id="nomeusuario" required>


                    <label class="form-label" for="email">Email</label>
                    <input class="form-input" type="email" name="email" placeholder="Email" id="email" required>


                    <label class="form-label" for="password">Senha</label>
                    <input class="form-input" type="password" name="senha" placeholder="Senha" id="password" autocomplete="new-password" required>


                    <button class="botao" type="submit">Confirmar</button>

                    <p>Já possui uma conta? <a href="login.php" class="logar-link">Faça Login</a></p>

                    <a href="../home/index.html" class="voltar-link"> Voltar </a>

                </form>
		    </div>
    </body>