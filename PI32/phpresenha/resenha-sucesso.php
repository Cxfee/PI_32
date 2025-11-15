<?php
// Página de sucesso após publicar resenha
session_start();
include('../phplogin/conexao.php');

// Pega o ID da resenha publicada pela query string
$resenha_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$produto = '';
$texto_resenha = '';
$nomeusuario = '';

if ($resenha_id > 0) {
    $sql = "SELECT r.nomeproduto, r.resenha, u.nomeusuario FROM resenhas r JOIN usuarios u ON r.id_usuario = u.id WHERE r.id = ? LIMIT 1";
    if ($stmt = $conexao->prepare($sql)) {
        $stmt->bind_param('i', $resenha_id);
        $stmt->execute();
        $stmt->bind_result($produto, $texto_resenha, $nomeusuario);
        $stmt->fetch();
        $stmt->close();
    }
}

// Para exibir texto no WhatsApp vamos montar a mensagem sem expor caracteres que quebrem a URL
$mensagem_texto = '';
if (!empty($produto) || !empty($texto_resenha)) {
    $mensagem_texto = "Confira minha nova resenha no EsporteMais!%0AProduto: " . rawurlencode($produto) . "%0A%0A" . rawurlencode($texto_resenha);
}
$linkWhatsapp = "https://api.whatsapp.com/send?text=" . $mensagem_texto;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resenha Publicada!</title>
    <link rel="stylesheet" href="../public/css/fonts.css">
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/resenha.css">
    <link rel="stylesheet" href="../public/css/resenha-sucesso.css">
    <style>
        .container {
            max-width: 680px;
            margin: 60px auto;
            text-align: center;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
            padding: 28px;
        }
        h2 { color: #0446aa; font-size: 1.6rem; margin-bottom: 12px; }
        p { font-size: 1.05rem; color: #333; margin-bottom: 18px; }
        .button { display:inline-block; background:#25D366; color:#fff; padding:10px 18px; border-radius:12px; text-decoration:none; font-weight:600; }
        .button:hover { filter: brightness(0.95); }
        .main-link { display:inline-block; margin-top:18px; background:#0446aa; color:#fff; padding:10px 16px; border-radius:12px; text-decoration:none; font-weight:600; }
        .main-link:hover {background-color: #455da0;}
        .meta { margin-top:18px; text-align:left; padding:12px; border-radius:8px; background:#f8f9fb; color:#333; }
        .meta strong { display:block; margin-bottom:6px; }
        .resenha-link{text-decoration:none;}
    </style>
</head>
<body>
        <header>
            <div>
                <h1>
                    Esporte+  
                </h1>
            </div>
        </header>
    <div class="container">
        <h2>🎉 Parabéns!</h2>
        <p>Sua resenha foi publicada e já está disponível para todos os nossos amigos!</p>

        <?php if (!empty($produto) || !empty($texto_resenha)): ?>
            <div class="meta">
                <strong>Produto:</strong> <?php echo htmlspecialchars($produto); ?><br>
                <strong>Autor:</strong> <?php echo htmlspecialchars($nomeusuario); ?><br>
                <strong>Trecho da resenha:</strong>
                <div><?php echo nl2br(htmlspecialchars(mb_strimwidth($texto_resenha, 0, 400, '...'))); ?></div>
            </div>
            <br>
        <?php endif; ?>

        <a href="<?php echo $linkWhatsapp; ?>" class="button" target="_blank" rel="noopener noreferrer">📱 Compartilhar no WhatsApp</a>
        <br>
        <a href="../phpfeed/feed.php" class="main-link">Ver todas as resenhas</a>
        <br><br>
        <a href="../phpresenha/resenha.php" class="resenha-link">Escrever outra resenha</a>
    </div>
</body>
</html>
