<?php

require_once("dbCon.php");
$tischId = $_GET['id'];


$stmtScan = $pdo->prepare("DELETE FROM tblScan WHERE scanTischId = ? ");
$stmtKommentar = $pdo->prepare("DELETE FROM tblkommentar WHERE kommentarTischId = ? ");
$stmtTisch = $pdo->prepare("DELETE FROM tblTisch WHERE tischId = ? ");
$stmtScan->execute([$tischId]);
$stmtKommentar->execute([$tischId]);
sleep(1);
$stmtTisch->execute([$tischId]);

header('Location: index.php');





?>