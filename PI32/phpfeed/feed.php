<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/fonts.css">
    <link rel="stylesheet" href="../public/css/global.css">
    <link rel="stylesheet" href="../public/css/feed.css">
    <title>Resenhas Recentes</title>
</head>
<body>
    <header>
        <div>
            <h1>Esporte+</h1>
        </div>
    </header>

   <div class ="tabela"> 
     <?php
        echo "<table>";
        echo "<tr><th>Produto</th><th>Tipo</th><th>Preço</th><th>Resenha</th><th>Usuário</th></tr>";

        class TableRows extends RecursiveIteratorIterator {
            function __construct($it) {
                parent::__construct($it, self::LEAVES_ONLY);
            }
            function current() {
                return "<td>" . parent::current(). "</td>";
            }
            function beginChildren() {
                echo "<tr>";
            }
            function endChildren() {
                echo "</tr>\n";
            }
        }

        try {
            $db = new PDO('mysql:host=localhost;dbname=pi_32;charset=utf8', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("
                SELECT r.nomeproduto, r.tipoproduto, r.precoproduto, r.resenha, u.nomeusuario
                FROM resenhas r
                JOIN usuarios u ON r.id_usuario = u.id
                ORDER BY r.data_resenha DESC
            ");
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                echo $v;
            }
        }
        catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        $db = null;
        echo "</table>";
    ?>
        <div class="main-button">
            <a href="../phplogin/logout.php" class="main-link"> Voltar </a>
        </div>
   </div>
    

</body>
</html>