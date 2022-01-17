<!DOCTYPE html>

<html>
    <head>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/raum.css" rel="stylesheet">
        <link rel="icon" href="favicon.png">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>  
    </head>
    <body>
    <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
    </div>

    <div id=tisch_aus>
        <h1>Tisch auswählen</h1>
    </div>
<?php

    require_once("dbCon.php");
   
    

    $tischRaumId = $_GET['raumid'];
    $counter = 1;
    $stmt = $pdo->prepare("SELECT * FROM tblTisch where tischRaumId = ? ORDER BY tischNummer");
    $stmt->execute([$tischRaumId]);      
    foreach ($stmt->fetchAll() as $row){
        
        $stmtErgebniss = $pdo->prepare("SELECT scanErgebniss FROM tblScan where scanTischId = ? ORDER BY scanTime DESC LIMIT 1");
        $stmtErgebniss->execute([$row['tischId']]);
        if ($stmtErgebniss->rowCount() > 0){
            foreach($stmtErgebniss->fetchAll() as $borderErgebniss);{
                if ($borderErgebniss['scanErgebniss'] == 0){
                    $border = 'style="border-color:#FA502C ! important; background-color:#FA502C ! important;"'; 
                }
                else if ($borderErgebniss['scanErgebniss'] == 1){
                    $border = 'style="border-color:#90EE90 ! important; background-color:#90EE90 ! important;"';
                }
                              
            }
        }
        else {
            $border = '';
        }
        if ($counter === 1){
            echo "<div id='tische'>";
        }
        echo "<a class='tisch_e' href='tisch.php?tischId=".$row['tischId']."&tischNummer=".$row['tischNummer']."'$border> Tisch - "  .$row['tischNummer'] . "</a>";
        if ($counter === 3){
            echo "</div>";
        }
        $counter += 1;
        if ($counter === 4){
            $counter = 1;
        }

    }
    
?>

<div id=placeholder>
    
</div>

</body>
</html>