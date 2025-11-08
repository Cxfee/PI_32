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
            <h1>
                Esporte+  
            </h1>
        </div>
    </header>
    <?php
        echo "<table >";
        echo "<tr><th> Produto</th><th>Tipo</th><th>Preço</th><th>Resenha</th></tr>";

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
                echo "</tr>" . "\n";
            }
        }

        try {
            $db = new PDO('mysql:host=localhost;dbname=meu_banco;charset=utf8', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("SELECT nomeproduto, tipoproduto, precoproduto, resenha FROM resenhas");
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
    <a href="../index.html" class="main-link"> Voltar à Página Principal </a>
    </div>
</body>
</html>