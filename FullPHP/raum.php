<!DOCTYPE html>

<html>
    <head>
    <title>WTC - WorkstationToolCheck</title>
    <link href="Styles/raum.css" rel="stylesheet">
    </head>
    <body>
    <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>
<?php

    require_once("dbCon.php");
   
    

    $tischRaumId = $_GET['raumid'];
    $counter = 1;
    $stmt = $pdo->prepare("SELECT * FROM tblTisch where tischRaumId = ? ORDER BY tischNummer");
    $stmt->execute([$tischRaumId]);      
    foreach ($stmt->fetchAll() as $row){
        if ($counter === 1){
            echo "<div id='tische'>";
        }
        echo "<a class='tisch_e' href='tisch.php?tischId=".$row['tischId']."&tischNummer=".$row['tischNummer']."'> Tisch -"  .$row['tischNummer'] . "</a>";
        if ($counter === 3){
            echo "</div>";
        }
        $counter += 1;
        if ($counter === 4){
            $counter = 1;
        }

    }
    
?>
</body>
</html>