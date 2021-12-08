<?php

require_once("dbCon.php");

    $stmt = $pdo->prepare("SELECT * FROM tblraum");
    $stmt->execute();

    foreach ($stmt->fetchAll() as $row) {
        echo "<tr><td>ID: " .$row['raumId']. ", Bezeichnung: " .$row['raumBezeichnung']."<tr><td> <br>" ;
    }
    
    echo "<br><br>";
    $stmt = $pdo->prepare("SELECT * FROM tbltisch");
    $stmt->execute();

    foreach ($stmt->fetchAll() as $row) {
      echo "<tr><td>ID: " .$row['tischId']. ", TischNummer: " .$row['tischNummer'].", RaumId: " .$row['tischRaumId']."<tr><td> <br>" ;
  }
  // set the resulting array to associative
?>