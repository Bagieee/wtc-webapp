<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>WTC - WorkstationToolCheck</title>
        <link href="Styles/raum.css" rel="stylesheet">
        <link rel="icon" href="favicon.png">

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
            <h1>Mustervorlagen aller Räume</h1>
        </div>

        <div id="raumIdAuss">
            <a id="raumIdd"><h3 style="padding-top: 5%;"> Werkraum: 1 </h3></a>  
        </div>

        <div id="raumIdAuss">
            <a id="raumIdd"><h3> Werkraum: 2 </h3></a>  
        </div>

        <div id="raumIdAuss">
            <a id="raumIdd"><h3> Werkraum: 3 </h3></a>  
        </div>

        <div id=placeholder>
    
        </div>

</body>
</html>

        
        

        
        