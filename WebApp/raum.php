<!DOCTYPE html>

<html>
    <head>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/raum.css" rel="stylesheet">
        <link rel="icon" href="favicon.png">
        <meta http-equiv="refresh" content="5">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>  
    </head>
    <body>

    <?php 
        require_once("ver.php")
    ?>

    <div id="ver" class="ver"><?=$ver?></div>

    <div id="titel">
            <a href="index.php"><h1 style="margin-top: 0%;">WTC - WorkstationToolCheck</h1></a>  
    </div>

    <div id="raumIdAus">
            <a id="raumId"><h3> Werkraum: <?=$_GET['raumid']?> </h3></a>  
    </div>

    <div id=tisch_aus>
        <h1>Tisch Auswahl und Übersicht</h1>
    </div>
<?php

    require_once("dbCon.php");

    $tischRaumId = $_GET['raumid'];
    $counter = 1;
    $stmt = $pdo->prepare("SELECT * FROM tbltisch where tischRaumId = ? ORDER BY tischNummer");
    $stmt->execute([$tischRaumId]);      
    foreach ($stmt->fetchAll() as $row){
        
        $stmtErgebniss = $pdo->prepare("SELECT scanErgebniss FROM tblscan where scanTischId = ? ORDER BY scanTime DESC LIMIT 1");
        $stmtErgebniss->execute([$row['tischId']]);
        if ($stmtErgebniss->rowCount() > 0){
            foreach($stmtErgebniss->fetchAll() as $borderErgebniss);{
                if ($borderErgebniss['scanErgebniss'] == 0){
                    $border = 'style="border-color:#f17056 ! important; background-color:#f17056 ! important;"'; 
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
        if ($counter === 10){
            echo "</div>";
        }
        $counter += 1;
        if ($counter === 9){
            $counter = 1;
        }

    }
    
?>


</body>
</html>