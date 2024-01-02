<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Ajouter un livre</title>
</head>
<body>
    <h1>Ajouter un livre</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./searchBook.php" >Recherche</a>
        <a href="./addBook.php">Ajouter un livre</a>
        <a href="./modif.php">Modifier</a>
    </nav>
    <form action="./addBook.php" method="post">
        <label>Titre du livre : </label>
        <input type="text" name="titre">
        <label>Auteur : </label>
        <input type="text" name="auteur">
        <label>Année : </label>
        <input type="text" name="anne">
        <input type="submit" value="ajouter un livre">

    </form>
    <?php 
            require './DB/conexion.php';
        function checkTitre($t){
            return true;
        }
        function checkAuteur($a){
            return true;
        }
        function checkAnne($anne){
            $anne = intval($anne);
            return true;
        }
        if (isset($_POST["titre"])){
    
            $titre = $_POST["titre"];
            $auteur = $_POST["auteur"];
            $anne = $_POST["anne"];
            if ((checkAuteur($auteur) && checkTitre($titre) && checkAnne($anne))){
                $sql = "INSERT INTO livres (Titre,Auteur,Anne) VALUES (?, ?, ?);";
                $res = $pdo->prepare($sql);
                $res->execute([$titre,$auteur,$anne]);
                if($res){
                    echo "<h3> Livre ajouter avec succes </h3>
                    <p> Titre : $titre </p>
                    <p> Auteur : $auteur </p>
                    <p> Année : $anne </p>
                    ";
                }
            }


        }
        

    ?>
</html>