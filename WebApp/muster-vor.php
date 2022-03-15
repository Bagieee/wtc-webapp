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


        <?php

            require_once("dbCon.php");
            
            $stmt = $pdo->prepare("SELECT * FROM tblpic ORDER BY picRaumId asc");
            $stmt->execute();

            foreach($stmt as $row)
            {
                echo "<div id=\"raumIdAuss\">";
                echo "<a id=\"raumIdd\"><h3>Werkraum". $row["picRaumId"]."</h3></a>";
                echo "<form action=\"picUp.php\" method=\"post\" enctype=\"multipart/form-data\">";
                echo "<input type=\"file\" id=\"files\" name=\"files\">";
                echo "<input type=\"submit\" name=\"submit\">";
                echo "</form>";
                echo "<img id=\"pic\" class=\"pic\" src=\"".$row["picUrl"]."\"/>";
                echo "</div>";
            }

        ?>

        <div id=placeholder>
    
        </div>

</body>
</html>

        
        

        
        