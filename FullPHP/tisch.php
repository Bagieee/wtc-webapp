<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/tisch.css" rel="stylesheet">

        <!-- UIKIT und BOOTSTRAP EINBINDUNG -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>

    <?php
        require_once("dbCon.php");
        $tischId = $_GET['tischId'];
        $tischNummer = $_GET['tischNummer'];
    ?>


        <div id="tisch_id">
            <h1>TISCH - <?=$tischNummer?></h1>    
        </div>     
            
        <div id="log_title">
            <h1>Scan-Protokoll & Informationen</h1>
        </div>

        <div id="output1">
            
            <table id="in_aa" border="1">
                    <tr>
                        <th>Datum/Uhrzeit</th>
                        <th>Ergebniss</th>
                    </tr>
                <?php

                $stmt = $pdo->prepare("SELECT * FROM tblScan where scanTischId = ? ORDER BY scanTime");
                $stmt->execute([$tischId]);
                foreach($stmt->fetchAll() as $row){
                    if ($row['scanErgebniss'] === 1){
                        $ergebniss = "Vollständig";
                        $farbe = "lightgreen";
                    }
                    else {
                        $ergebniss = "Unvollständig";
                        $farbe = "red";
                    }
                    echo "<tr style='background-color:".$farbe."'>";
                    echo "<td>".$row['scanTime']."</td>";
                    echo "<td>".$ergebniss."</td>";
                    echo "</tr>";
                }

                ?>
            </table>
            <table id="in_aa" border="1">
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

        
            
        
        
    
    </body>
</html>