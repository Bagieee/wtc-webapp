<?php

    class Querie {
        private $pdo;
        
        public $name;
        public $tischNummer;
        public $raumNummer;
        public $ergebniss;
        public $ergebnissKommentar;
        public $kommentar;
        
        public function __construct($db) {
            $this->pdo = $db;
        }

        //Scan übermitteln
        public function scanPos() {
              
            $stmt = $this->pdo->prepare('INSERT INTO tblscan (scanTischId, scanErgebniss, scanName) values ((select tischId from tblTisch where tischRaumId = ? AND tischNummer = ? ), ? , ? )');

            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $this->tischNummer = htmlspecialchars(strip_tags($this->tischNummer));
            $this->ergebniss = htmlspecialchars(strip_tags($this->ergebniss));
            $this->name = htmlspecialchars(strip_tags($this->name));

            if($stmt->execute([$this->tischRaumId, $this->tischNummer, $this->ergebniss, $this->name])) {
                return true;
            }
        }

        public function scanNeg() {
            $stmt = $this->pdo->prepare('INSERT INTO tblscan (scanTischId, scanErgebniss, scanName, scanKommentar) values ((select tischId from tblTisch where tischRaumId = ? AND tischNummer = ? ), ? , ? , ? )');

            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $this->tischNummer = htmlspecialchars(strip_tags($this->tischNummer));
            $this->ergebniss = htmlspecialchars(strip_tags($this->ergebniss));
            $this->ergebnissKommentar = htmlspecialchars(strip_tags($this->ergebnissKommentar));
            $this->name = htmlspecialchars(strip_tags($this->name));

            if($stmt->execute([$this->tischRaumId, $this->tischNummer, $this->ergebniss, $this->name, $this->ergebnissKommentar])) {
                return true;
            }
        }

        public function comment() {
            $stmt = $this->pdo->prepare('INSERT INTO tblKommentar (kommentarTischId, kommentarName, kommentarText) values ((select tischId from tblTisch where tischRaumId = ? AND tischNummer = ? ), ? , ? )');

            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $this->tischNummer = htmlspecialchars(strip_tags($this->tischNummer));
            $this->kommentar = htmlspecialchars(strip_tags($this->kommentar)); 
            $this->name = htmlspecialchars(strip_tags($this->name));

            if($stmt->execute([$this->tischRaumId, $this->tischNummer, $this->name, $this->kommentar])) {
                return true;
            }
        }
    }
?>