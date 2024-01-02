<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Search</title>
</head>
<body>
    <?php
        require "./DB/conexion.php";
        $sql = 'DESCRIBE livres';
        $res = $pdo->query($sql);
        $selectName = $res->fetchAll();
    ?>
    <h1>Rechercher un livre</h1>
    <nav>
        <a href="./index.php">Home</a>
        <a href="./searchBook.php" >Recherche</a>
        <a href="./addBook.php">Ajouter un livre</a>
        <a href="./modif.php">Modifier</a>
    </nav>
    <form action="./searchBook.php" method="get">
        <label>Rechercher :</label>
        <input type="text" name="search">
        <label>recherche sur : </label>
        <select name="type">
            <?php
                foreach ($selectName as $select){
                    echo "<option value='".$select[0] ."'>".$select[0] . "</option>";
                }
            ?>
        </select>
        <input type="submit" value="recherche">
    </form>
    <?php
        require './functions.php';
        function checkSearch($s){
            return true;
        }
        function checkType($t){
            return true;
        }

        if (isset($_GET['search'])){
            $search = $_GET['search'];
            $type = $_GET['type'];
            $sql ="SELECT * FROM livres WHERE $type = ?";
            $res = $pdo->prepare($sql);
            if (checkType($type) && checkSearch($search)){
                $res->execute([$search]);
                $tab = $res->fetchAll(PDO::FETCH_NUM); // Permet de récuperer les rows indexer de 0 à n
                if (count($tab) > 0){
                    echo "<h3>Resultat : </h3>";
                    echo "<table>";
                    tableHead($pdo);
                    tableBody($tab);
                    echo "</table>";
                }
                else{
                    echo "<h3> Recherche introuvable </h3>";
                    echo "<div>
                    <p>Contenus de la recherche : </p>
                    <p>Recherche : $search / type : $type </p>
                    </div>";
                }

            }
        }
    ?>
</body>
</html>