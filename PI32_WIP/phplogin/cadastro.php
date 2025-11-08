<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="login">
        <h2>Crie sua conta</h2>
        <form action="cadastro-processo.php" method="post">
            <label for="nomeusuario">Nome de Usuário</label>
            <input type="text" name="nomeusuario" id="nomeusuario" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>

            <button class="botao" type="submit">Confirmar</button>

            <p>Já possui uma conta? <a href="login.php" class="logar-link">Faça login</a></p>
            <a href="../index.html" class="voltar-link">Voltar</a>
        </form>
    </div>
</body>
</html>