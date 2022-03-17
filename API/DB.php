<?php

class Datenbank {
    private $pdo = false;
    private $servername = "localhost";
    private $dbname = "wtc";
    private $username = "web";
    private $password = "";
    private $options = [
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    public function connect() {
    $dsn = "mysql:host=$this->servername;dbname=$this->dbname";
    try {
        $this->pdo = new PDO($dsn, $this->username, $this->password, $this->options);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        
        return false;
    }
    return $this->pdo;
}
}

?>