<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier / suprimer</title>
    <link rel="stylesheet" href="./style/style.css">
</head>
<body>
    <h1>Modifier / suprimer</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./searchBook.php" >Recherche</a>
        <a href="./addBook.php">Ajouter un livre</a>
        <a href="./modif.php">Modifier</a>
    </nav>
    <?php
        require "./DB/conexion.php";
        require './functions.php';
        if (isset($_POST['IdSupr'])){
            
            $idSupr = $_POST['IdSupr'];
            $sql = "DELETE FROM livres WHERE ID_Livre = ? ";
            $res = $pdo->prepare($sql);
            $res->execute([$idSupr]);
        }
        if (isset($_POST['0'])){
            $sql = "UPDATE livres SET Titre = ? ,Auteur = ? ,Anne = ? WHERE ID_Livre = ". $_POST['0'].";";
            $res = $pdo->prepare($sql);
            $res->execute([$_POST['1'],$_POST['2'],$_POST['3']]);
        }
        if (isset($_POST['action']) && $_POST['action'] === 'suprimer'){
            $sql = "DELETE FROM livres WHERE ID_Livre = ?;";
            $res = $pdo->prepare($sql);
            $res->execute([$_POST['row']]);
        }
        echo "<div class='modifier'>";

        $res = $pdo->query("SELECT * FROM livres");
        $tab = $res->fetchAll(PDO ::FETCH_NUM);

        foreach ($tab as $row){
            echo "<div>";
            if (isset($_POST['action'] )&& $_POST['action'] === "modifier" && $_POST['row'] === $row[0]){
                echo"<form method='post' action='./modif.php'>";
                echo "<span>" . $row[0]."</span>
                <input type='hidden' value=".$row[0]." name='0' >
                ";
                
                for ($i = 1 ; $i < count($row) ; $i++){
                    echo " <input type='text' value=".htmlentities($row[$i])." name='$i' >";
                } 
                echo "<input type='submit' value='sauvegarder'></form>"
                ;
            }
            else{
                for ($i = 0 ; $i < count($row) ; $i++){
                    echo "<span>". htmlentities($row[$i]) . "</span>";
                    
                }
                echo"
                    <form method='post' action='./modif.php'>
                        <input type='hidden' name='action' value='modifier'>
                        <input type='hidden' name='row' value=".$row[0]."> 
                        <input type='submit' value='modifier'>
                    </form>
                    <form method='post' action='./delete.php'>
                        <input type='hidden' name='action' value='suprimer'>
                        <input type='hidden' name='id' value=".$row[0].">
                        <input type='submit' value='suprimer'>
                    </form>
                ";
            }

            echo"</div>";
        }
        echo "</div>"

    ?>
</body>
</html>