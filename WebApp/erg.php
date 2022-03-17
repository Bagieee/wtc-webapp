<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/tisch.css" rel="stylesheet">
        <link rel="icon" href="favicon.png">
        <meta http-equiv="refresh" content="10">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>  
    </head>
    <body>
        <div id="container">

        <?php 
            require_once("ver.php")
        ?>

        <div id="ver" class="ver"><?=$ver?></div>
        
        <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>

        <div id=tisch_aus>
            <h1>Ergebnisse & Zusammenfassung aller Tische</h1>
        </div>

        <div id="output1">
            <div id="tablediv">
                <table id="tables">
                    <tr>
                        <th>Datum/Uhrzeit</th>
                        <th>Raum/Tisch</th>
                        <th>Name</th>
                        <th>Ergebniss</th>
                        <th>Kommentar</th>
                    </tr>
                <?php

                require_once("dbCon.php");

                $tischIds = $pdo->prepare("SELECT tischId, tischRaumId, tischNummer from tbltisch ORDER BY tischRaumId, tischNummer limit 30");
                $tischIds->execute();

                foreach($tischIds->fetchAll() as $tischId){

                    $scanErgebnisse = $pdo->prepare("SELECT scanName, scanErgebniss, scanKommentar, scanTime from tblscan where scanTischId = ? ORDER BY scanTime DESC LIMIT 1");
                    $scanErgebnisse->execute([$tischId['tischId']]);
                    foreach ($scanErgebnisse->fetchAll() as $row){
                    
                        if ($row['scanErgebniss'] === 1){
                            $ergebniss = "Vollständig";
                            $class = "backgroundGreen";
                        }
                        else {
                            $ergebniss = "<b>Unvollständig</b>";
                            $class = "backgroundRed";
                        }
                        echo "<tr id='".$class."'>";
                        echo "<td>" .$row['scanTime']. "</td>";
                        echo "<td> Raum: " .$tischId['tischRaumId']. " | Tisch: " .$tischId['tischNummer']. "</td>";
                        echo "<td>" .$row['scanName']. "</td>";
                        echo "<td>" .$ergebniss. "</td>";
                        echo "<td>" .$row['scanKommentar']. "</td>";
                        echo "</tr>";
                    
                    }

                }
                ?>
                
                </table>
            </div>
        </div>

        <div id=placeholder>
    
        </div>

</body>
</html>

        
        

        
        