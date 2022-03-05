<?php

require_once('dbCon.php');
require('fpdf.php');
class PDF extends FPDF{
// function Header()
// {
//     // Arial bold 15
//     $this->SetFont('Arial','B',15);
//     // Move to the right
//     $this->Cell(80);
//     // Title
//     $this->Cell(30,10,'Title',1,0,'C');
//     // Line break
//     $this->Ln(20);
// }
// // Page footer
// function Footer()
// {
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Page number
//     $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
// }
}
$x = 0;
$y;
$pdf = new PDF();

$pdf->AddPage();
    $stmt = $pdo->prepare("SELECT tischNummer, tischRaumId FROM tblTisch");
    $stmt->execute();      
        foreach ($stmt->fetchAll() as $row){
            if ($x == 0){
                $url = urlencode($row["tischRaumId"].'/'.$row["tischNummer"]);
                $pdf->Image('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$url.'&choe=UTF-8', 20, NULL, NULL, NULL,'PNG');
                $y = $pdf->GetY();
                $x=1;
            }
            if ($x == 1){
                $url = urlencode($row["tischRaumId"].'/'.$row["tischNummer"]);
                $pdf->Image('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$url.'&choe=UTF-8', 110, $y, NULL, NULL,'PNG');
                $x=0;
            }
            
        }

$pdf->Output();



