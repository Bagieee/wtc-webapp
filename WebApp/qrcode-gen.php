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

        <div id="ver" class="ver">1.0.0</div>
        
        <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>
        
        <form action="qrcode-gen.php" id="eingabe_div" method="get">
            
        <div id=add_title>
            <h1>QR-Code Wiederherstellung / Generierung</h1>
        </div>

        Raum: 
        <select name="raumid" id="raumid" methode="get" onchange="this.form.submit();">
        <?php
          $raumid = 0;
          if(isset($_GET['raumid'])){
            $raumid = $_GET['raumid'];
            echo '<option value="0" disabled hidden >Raum auswählen</option>';
          }
          else {
            echo '<option value="0" disabled hidden selected>Raum auswählen</option>';
          }
          require_once("dbCon.php");
          $stmt = $pdo->prepare("SELECT * FROM tblraum");
          $stmt->execute();    
          foreach ($stmt->fetchAll() as $row){
            echo "<option value='".$row['raumId']."'>" . $row['raumBezeichnung'] ."</option>";
          }
        ?>
        </select>
        <script type="text/javascript">
         document.getElementById('raumid').value = "<?php echo $_GET['raumid'];?>";
        </script>
        

            Tisch:
            <select <?=(isset($_GET['raumid'])?'name="tischid"':'');?>) id="tischid" onchange="this.form.submit();">
            <?php
                if(!isset($_GET['raumid'])){
                    echo "<option> Bitte wählen sie zuerst einen Raum aus. </option>";
                }
                else{
                    $tischid = 0;
                    if(isset($_GET['raumid'])){
                      $raumid = $_GET['raumid'];
                      echo '<option value="0" disabled hidden>Tisch auswählen</option>';
                    }
                    else {
                      echo '<option value="0" disabled hidden selected>Tisch auswählen</option>';
                    }
                    require_once("dbCon.php");
                    $stmt = $pdo->prepare("SELECT * FROM tbltisch where tischRaumId = ?");
                    $stmt->execute([$raumid]);    
                    foreach ($stmt->fetchAll() as $row){
                      echo "<option value='".$row['tischId']."'> Tisch " . $row['tischNummer'] ."</option>";
                    }
                }
                

            ?>
        </select>
        <script type="text/javascript">
         document.getElementById('tischid').value = "<?php echo $_GET['tischid'];?>";
        </script>
        </form>
        
        <button id="gen_btn" class="btn_a" <?=(isset($_GET['tischid']) && isset($_GET['raumid']))?'':'disabled';?> onclick="generateCode()">QR-CODE GENERIEREN</button>

        <div id="qrcode"></div>
        
        </div>

        <div id=placeholder>
    
        </div>

    </body>

    <script>
        function generateCode() {
            var qrSize = 256;

            $('#qrcode').empty();
            $('#qrcode').qrcode({
                width: qrSize,
                height: qrSize,
                text: 
                $('#raumid').val()
                + "/"
                + $('#tischid').val()
                
            });
        }

    </script>

</html>
