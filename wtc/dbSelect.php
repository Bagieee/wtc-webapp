<?php

require_once("dbCon.php");

    $stmt = $pdo->prepare("SELECT * FROM tblraum");
    $stmt->execute();

    foreach ($stmt->fetchAll() as $row) {
        echo "<tr><td>ID: " .$row['raumId']. ", Bezeichnung: " .$row['raumBezeichnung']."<tr><td> <br>" ;
    }
  // set the resulting array to associative
?>