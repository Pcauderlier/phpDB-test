<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Librairies en lignes</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./searchBook.php" >Recherche</a>
        <a href="./addBook.php">Ajouter un livre</a>
        <a href="./modif.php">Modifier</a>
    </nav>

    <?php
        require "./DB/conexion.php";
        require "./functions.php";
        echo "<table>";
        tableHead($pdo);
        $sql = 'SELECT * FROM livres';
        $res = $pdo->query($sql);
        $livres = $res->fetchAll(PDO::FETCH_NUM);
        tableBody($livres);
        echo ('</table>')
       

    ?>
</body>
</html>