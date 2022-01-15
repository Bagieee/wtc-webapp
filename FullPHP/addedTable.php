<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/qrcode.css" rel="stylesheet">
        
        <!-- UIKIT und BOOTSTRAP EINBINDUNG -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.9.4/dist/js/uikit-icons.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body >

        <div id="container">
        
        <div id="titel">
            <a href="index.php"><h1>WTC - WorkstationToolCheck</h1></a>  
        </div>

        <div id="qrcode"></div>




        </div>  


    </body>



    <script>
        window.onload = function generateCode() {
            var qrSize = 256;

            $('#qrcode').empty();
            $('#qrcode').qrcode({
                width: qrSize,
                height: qrSize,
                text: 
                $('#<?php echo $_GET['raumId'];?>').val()
                + "/"
                + $('#<?php echo $_GET['tischNummer'];?>').val()
                
            });
        }

    </script>
 </html>