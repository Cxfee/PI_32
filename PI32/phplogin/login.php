<!DOCTYPE html>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div>
            <h1>
                Esporte+  
            </h1>
        </div>
    </header>
    <div class="login">
        <h2> Faça Login</h2>
         <form action="authenticate.php" method="post" class="form login-form">
            <label class="form-label" for="nomeusuario">Nome de Usuário</label>
            <input class="form-input" type="text" name="nomeusuario" placeholder="Nome de Usuário" id="nomeusuario" required>

            <label class="form-label" for="password">Senha</label>
            <input class="form-input" type="password" name="senha" placeholder="Senha" id="password" autocomplete="new-password" required>

            <button class="botao" type="submit">Confirmar</button>

             <p>Não possui uma conta? <a href="cadastro.php" class="cadastrar-link">Crie uma conta</a></p>

              <a href="../index.html" class="voltar-link"> Voltar </a>
        </form> 
     </div>
</body>
</html>