<?php

require_once("../dbCon.php");
    
$bezeichnung = $_POST['bezeichnung'];

try{
    $stmt = $pdo->prepare("Insert into tblRaum (raumBezeichnung) values ( ? )");
    $stmt->execute([$bezeichnung]);
    echo "Raum: $bezeichnung wurde hinzugefügt.";
}
catch(Exception $e)
{
    echo $e;
}
Header("Location: ../dbInsertRaum.php")
    ?>