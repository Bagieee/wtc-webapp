<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/qrcode.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>  

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
        
        <form id="eingabe_div">
            <input type="text" placeholder="Raumname" id="in_a" class="in_aa">
            <input type="text" placeholder="Tischnummer" id="in_b" class="in_aa">
        </form>
        
        <button id="gen_btn" class="btn_a" onclick="generateCode()">QR-CODE GENERIEREN</button>

        <div id="qrcode"></div>
        
     

      
            
            
            
            
            
            
            
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
                $('#in_a').val()
                + "/"
                + $('#in_b').val()
                
            });
        }


        function FormPruefung() {
        var check = true;

        if (document.getElementById('eingabe_div').value == '') {
            check = false;
        }

        if (check) {
            document.getElementById('gen_btn').disabled = false;
        }
    }
    </script>

</html>
