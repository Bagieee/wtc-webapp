<!DOCTYPE html>

<html>
    <head>
    <title>WTC - WorkstationToolCheck</title>
    <link href="Styles/raum.css" rel="stylesheet">
    <link rel="icon" href="C:\xampp\htdocs\ProjektWTC\favicon.png">

    <!-- UIKIT und BOOTSTRAP EINBINDUNG -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
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