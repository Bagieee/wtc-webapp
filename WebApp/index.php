<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/index.css" rel="stylesheet">
        <link rel="icon" href="favicon.png">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">

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

        <div id=raum_aus>
            <h1>Raum auswählen</h1>
        </div>


        <div id="raum">
            <a class="raum_e" href="raum.php?raumid=1"><b>Werkraum #1</b></a>  
            <a class="raum_e" href="raum.php?raumid=2"><b>Werkraum #2</b></a>
            <a class="raum_e" href="raum.php?raumid=3" style="margin-right: 0%;"><b>Werkraum #3</b></a> 
        </div>
        
        <div id=placeholder></div>
        
        <div id="splitbar">
            <hr>
        </div>


        
        <div id=tisch_aus>
            <h1>Zusammenfassung aller Werkbänke & Mustervorlagen</h1>
        </div>

        <div id="raum_z">
            <a class="raum_e" href="erg.php" style="margin-right: 3%;">Alle Ergebnisse anzeigen</a>    
            <a class="raum_e" href="muster-vor.php" style="margin-right: 0%;">Mustervorlagen aller Räume</a> 
        </div>


        <div id="btn_qrr">
            <a class="qrbtn" id="btn_qrT" href="addTable.php" style="margin-right: 1%;">~ NEUEN TISCH ZU RAUM HINZUFÜGEN ~</a>  
            <a class="qrbtn" id="btn_qrT" href="qrcode-gen.php">~ QR-CODE WIEDERHERSTELLEN / GENERIEREN ~</a>
        </div>
        
        <div id=placeholder2></div>
        
        </div>  
    </body>
 </html>