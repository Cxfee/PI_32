<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../..//public/css/fonts.css">
    <link rel="stylesheet" href="../../..//public/css/global.css">
    <link rel="stylesheet" href="resenha.css">
    <title>Criar Resenha</title>
</head>
<body>
       <header>
            <div>
                <h1>
                    Esporte+  
                </h1>
            </div>
        </header>
    <div class="resenha">
        <h1> Crie sua resenha! </h1>
        <form action="resenha-processo.php" method="post" class="form resenha-form">

            <label for="fname">Nome do Produto</label>
            <input type="text" id="nprod" name="nomeproduto" placeholder="Nome do Produto">

            <label for="lname">Tipo de Produto</label>
            <input type="text" id="tprod" name="tipoproduto" placeholder="Tipo de Produto (bola, tênis, etc)">

            <label for="preco">Preço</label>
            <input type="number" id="preco" name="precoproduto" placeholder="Preço em R$">

            <label for="subject">Resenha</label>
            <textarea id="resenha" name="resenha" placeholder="Sua resenha..." style="height:200px"></textarea>

            <input type="submit" value="Enviar">

        </form>
    </div>
    <div class="logout-button">
    <a href="../phplogin/logout.php" class="logout-link"> Logout </a>
    </div>
</body>
</html>