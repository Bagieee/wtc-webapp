<?php

require_once("dbCon.php");
$tischId = $_GET['id'];


$stmtScan = $pdo->prepare("DELETE FROM tblscan WHERE scanTischId = ? ");
$stmtKommentar = $pdo->prepare("DELETE FROM tblkommentar WHERE kommentarTischId = ? ");
$stmtTisch = $pdo->prepare("DELETE FROM tbltisch WHERE tischId = ? ");
$stmtScan->execute([$tischId]);
$stmtKommentar->execute([$tischId]);
sleep(1);
$stmtTisch->execute([$tischId]);

header('Location: index.php');





?>