<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/index.css" rel="stylesheet">
        
        <!-- UIKIT und BOOTSTRAP EINBINDUNG -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="container">
        
        <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>

        <div id=raum_aus>
            <h1>Raum auswählen</h1>
        </div>
                   
        <div id="raum">
            <a class="raum_e" href="raum.php?raumid=1">Werkraum #1</a>  
            <a class="raum_e" href="raum.php?raumid=2" style="margin-right: 0%;">Werkraum #2</a>
        </div>
        
        <div id="raum_u">
            <a class="raum_e" href="raum.php?raumid=3" style="margin-right: 0%;">Werkraum #3</a>    
        </div>
        
        <div id=tisch_aus>
            <h1>Zusammenfassung der Werkbänke</h1>
        </div>

        <div id="raum_z">
            <a class="raum_e" href="erg.php" style="margin-right: 0%;">Alle Ergebnisse anzeigen</a>    
        </div>





        <div id="btn_qr">
            <a class="qrbtn" href="qrcode-gen.php">QR-CODE WIEDERHERSTELLEN </a>
            ||
            <a class="qrbtn" href="addTable.php"> NEUEN TISCH HINZUFÜGEN</a>
        </div>
     
        
        </div>  
    </body>
 </html>