<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/qrcode.css" rel="stylesheet">
        <link rel="icon" href="favicon.png">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>  
    </head>
    <body>
        <div id="container" style="font-family: 'Mohave', sans-serif;">
        
        <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>
        
        <div id=add_title>
            <h1>Neue Tische hinzufügen</h1>
        </div>
        
            <form id="eingabe_div" method="post">
            Raum:
            <select name="raumId" id="raumId">
            Tischnummer:
        <?php
          require_once("dbCon.php");
          $stmt = $pdo->prepare("SELECT * FROM tblraum");
          $stmt->execute();      
          foreach ($stmt->fetchAll() as $row){
            echo "<option value='" .$row['raumId'] . "'>" . $row['raumBezeichnung'] . "</option>";
          }
        ?>
            <input type="number" placeholder="Tischnummer eingeben" id="tischNummer" name="tischNummer" class="in_aa">
            <br>
            <input type="submit" value="Tisch hinzufügen" id="btn_add"/>

        </form>

        <?php

          if (isset($_POST['tischNummer']) && isset($_POST['raumId'])){
            $tischNr = $_POST['tischNummer'];
            $raumEidi = $_POST['raumId'];

            $tableCheck = $pdo->prepare("SELECT * FROM tblTisch where tischRaumId = ? AND tischNummer = ?");
            $tableCheck->execute([$raumEidi, $tischNr]);

            if ($tableCheck->rowCount() == 0)
            {
                try{
                    $tableSubmit = $pdo->prepare("INSERT into tblTisch (tischRaumId, tischNummer) values ( ? , ? )");
                    $tableSubmit->execute([$raumEidi, $tischNr]);
                    echo "Tisch $tischNr wurde bei Raum $raumEidi eingefügt.";
                }
                catch (Exception $e)
                {
                    print_r($e);
                }
                
            }
            else {
                echo "Es gibt bereits einen Tisch mit der Nummer $tischNr beim Raum $raumEidi";
            }
          }


        ?>
    </body>
</html>

        