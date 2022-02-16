<?php

require_once("dbCon.php");
$scanId = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM tblscan WHERE scanid = ? ");
$stmt->execute([$scanId]);

header('Location:' .$_SERVER['HTTP_REFERER']);





?>