<?php

require_once("dbCon.php");
$kommentarId = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM tblkommentar WHERE kommentarId = ? ");
$stmt->execute([$kommentarId]);

header('Location:' .$_SERVER['HTTP_REFERER']);

?>