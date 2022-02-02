<?php

    //Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');
    
    include_once 'DB.php';
    include_once 'Querie.php';

    //Initialisierung und Verbindung
    $database = new Datenbank();
    $db = $database->connect();

    //Initialisiere übermittlung
    $Querie = new Querie($db);

    //Daten Auslesen
    $data = json_decode(file_get_contents("php://input"), true);
    $data = json_decode($data, true);

    $Querie->name = $data["name"];
    $Querie->tischRaumId = $data["tischRaumId"];
    $Querie->tischNummer = $data["tischNummer"];
    $Querie->ergebniss = $data["ergebniss"];
    $Querie->ergebnissKommentar = $data["ergebnissKommentar"];
    
    if ($Querie->scanNeg()) {
        echo json_encode(array('message' => 'Scan Created'));
    }
    else {
        echo json_encode(array('message' => 'Scan Not Created'));
    }
?>