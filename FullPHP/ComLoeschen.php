<?php

require_once("dbCon.php");
$kommentarId = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM tblKommentar WHERE kommentarId = ? ");
$stmt->execute([$kommentarId]);

header('Location:' .$_SERVER['HTTP_REFERER']);

?>