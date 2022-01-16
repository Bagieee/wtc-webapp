<?php

    require_once("dbCon.php");

    $raumid = $_GET['raumId'];
    $tischnummer = $_GET['tischNummer'];
    echo "$raumid , $tischnummer";

    $stmt = $pdo->prepare("Insert into tblTisch (tischRaumId, tischNummer) values ( ? , ? )");
    $stmt->execute([$raumid, $tischnummer]);


    Header("Location: addTable.php?raumId=$raumid&tischNummer=$tischnummer")
?>