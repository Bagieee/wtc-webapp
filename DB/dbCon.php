<?php
$PDO = false;

$servername = "localhost";
$dbname = "wtc";
$username = "root";
$password = "";
$options = [
    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES   => false,
];
$dsn = "mysql:host=$servername;dbname=$dbname";
try {
    $pdo = new \PDO($dsn, $username, $password, $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
  
    } catch (PDOException $e) {
        
        return false;
    }

    
  // set the resulting array to associative
?>