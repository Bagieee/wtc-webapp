<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles\tisch.css" rel="stylesheet" type="text/css">
        <link rel="icon" href="favicon.png">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>  
    </head>
    <body>

    <?php
        require_once("dbCon.php");
        $tischId = $_GET['tischId'];
        $tischNummer = $_GET['tischNummer'];
    ?>
        <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>

        <div id="tisch_id">
            <h1>TISCH - <?=$tischNummer?></h1>    
        </div>     
            
        <div id="log_title">
            <h1>Scan-Protokoll</h1>
        </div>

        <div id="output1">
            <div id="tablediv">
                <table id="tables">
                    <tr>
                        <th>Datum/Uhrzeit</th>
                        <th>Name</th>
                        <th>Ergebniss</th>
                        <th>Kommentar</th>
                    </tr>
                <?php

                $stmt = $pdo->prepare("SELECT * FROM tblScan where scanTischId = ? ORDER BY scanTime");
                $stmt->execute([$tischId]);
                foreach($stmt->fetchAll() as $row){
                    if ($row['scanErgebniss'] === 1){
                        $ergebniss = "Vollständig";
                        $class = "backgroundGreen";
                    }
                    else {
                        $ergebniss = "Unvollständig";
                        $class = "backgroundRed";
                    }
                    echo "<tr id='".$class."'>";
                    echo "<td>".$row['scanTime']."</td>";
                    echo "<td>".$row['scanName']."</td>";
                    echo "<td>".$ergebniss."</td>";
                    echo "<td>".$row['scanKommentar']."</td>";
                    echo "</tr>";
                }

                ?>
                
                </table>
            </div>


            <div id="tabledivv">

            <h1>Informationen</h1>

                <table id="tables2">
                <tr>
                <th>Datum/Uhrzeit</th>
                <th>Name</th>
                <th>Kommentar</th>
                </tr>
                <?php

                $stmt = $pdo->prepare("SELECT * FROM tblKommentar where kommentarTischId = ? ORDER BY kommentarTime");
                $stmt->execute([$tischId]);
                foreach($stmt->fetchAll() as $row){
                    echo "<tr>";
                    echo "<td>".$row['kommentarTime']."</td>";
                    echo "<td>".$row['kommentarName']."</td>";
                    echo "<td>".$row['kommentarText']."</td>";
                    
                    echo "</tr>";
                }

                ?>
                </table>
            </div>
            </div> 
            
            <div id=placeholder>
    
            </div>

    </body>
</html>