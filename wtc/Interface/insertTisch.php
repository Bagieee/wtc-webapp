<?php

require_once("../dbCon.php");
    
$nummer = $_POST['nummer'];
$raumId = $_POST['raumId'];

try{
    $stmt = $pdo->prepare("Insert into tblTisch (tischRaumId, tischNummer) values ( ? , ? )");
    $stmt->execute([$raumId, $nummer]);
    echo "Tisch $nummer wurde mit raum $raumId hinzugefügt.";

}
catch(Exception $e)
{
    echo $e;
}
//Header("Location: ../dbInsertTisch.php");
?>