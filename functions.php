<?php
    require "./DB/conexion.php";

    function tableHead($pdo){
        $sql = 'DESCRIBE livres';
        $res = $pdo->query($sql);
        $columnNames = $res->fetchAll(); // permet de tout stocker dans une liste
        echo '<tr>';
        foreach ($columnNames as $names){
            echo "<th>".$names[0] . "</th>";
        }
        echo "</tr>";
    }
    function tableBody($tab){
        foreach ($tab as $row){
            echo ('<tr>');
            for ($i = 0 ; $i < count($row); $i++){
                echo "<td>".$row[$i] . "</td>";
            }
            echo "</tr>";
        }
    }
?>