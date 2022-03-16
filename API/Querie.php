<?php

    class urlValues{
        public $picUrl;
    }
    class Querie {
        private $pdo;
        
        public $name;
        public $tischNummer;
        public $raumNummer;
        public $ergebniss;
        public $ergebnissKommentar;
        public $kommentar;
        public $tischRaumId;
        
        public function __construct($db) {
            $this->pdo = $db;
        }

        //Positiven Scan übermitteln
        public function scanPos() {
              
            $stmt = $this->pdo->prepare('INSERT INTO tblscan (scanTischId, scanErgebniss, scanName) values ((select tischId from tbltisch where tischRaumId = ? AND tischNummer = ? ), ? , ? )');

            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $this->tischNummer = htmlspecialchars(strip_tags($this->tischNummer));
            $this->ergebniss = htmlspecialchars(strip_tags($this->ergebniss));
            $this->name = htmlspecialchars(strip_tags($this->name));

            if($stmt->execute([$this->tischRaumId, $this->tischNummer, $this->ergebniss, $this->name])) {
                return true;
            }
        }

        //Negativen Scan übermitteln
        public function scanNeg() {
            $stmt = $this->pdo->prepare('INSERT INTO tblscan (scanTischId, scanErgebniss, scanName, scanKommentar) values ((select tischId from tbltisch where tischRaumId = ? AND tischNummer = ? ), ? , ? , ? )');

            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $this->tischNummer = htmlspecialchars(strip_tags($this->tischNummer));
            $this->ergebniss = htmlspecialchars(strip_tags($this->ergebniss));
            $this->ergebnissKommentar = htmlspecialchars(strip_tags($this->ergebnissKommentar));
            $this->name = htmlspecialchars(strip_tags($this->name));

            if($stmt->execute([$this->tischRaumId, $this->tischNummer, $this->ergebniss, $this->name, $this->ergebnissKommentar])) {
                return true;
            }
        }

        //Kommentar übermitteln
        public function comment() {
            $stmt = $this->pdo->prepare('INSERT INTO tblkommentar (kommentarTischId, kommentarName, kommentarText) values ((select tischId from tbltisch where tischRaumId = ? AND tischNummer = ? ), ? , ? )');

            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $this->tischNummer = htmlspecialchars(strip_tags($this->tischNummer));
            $this->kommentar = htmlspecialchars(strip_tags($this->kommentar)); 
            $this->name = htmlspecialchars(strip_tags($this->name));

            if($stmt->execute([$this->tischRaumId, $this->tischNummer, $this->name, $this->kommentar])) {
                return true;
            }
        }

     

        public function url() {
            $this->tischRaumId = htmlspecialchars(strip_tags($this->tischRaumId));
            $stmt = $this->pdo->prepare('SELECT picUrl from tblpic where picRaumId = ? LIMIT 1');
            $stmt->execute([$this->tischRaumId]);
            $url = "";
            foreach ($stmt->fetchAll() as $row)
            {
                $url = $row["picUrl"];
            }
            return $url;
        }
    }
?>