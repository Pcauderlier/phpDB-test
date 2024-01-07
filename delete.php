<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Suprimer</title>
</head>
<body>
    <h2>Voulez vous vraiment supprimer : </h2>
    <table>
    <?php
        require './DB/conexion.php';
        require './functions.php';
        tableHead($pdo);
        $id = $_POST['id'];
        $sql = "SELECT * FROM livres WHERE ID_Livre = ?";
        $res = $pdo->prepare($sql);
        $res->execute([$id]);
        $tab = $res->fetchAll(PDO::FETCH_NUM);
        tableBody($tab);

    ?>
    </table>
    <form method="post" action="./modif.php">
        <?php
        echo'
        <input type="hidden" value = '.$id .' name="IdSupr"/>'
        ?>
        <input type="submit" value="suprimer"/>
    </form>
</body>
</html>