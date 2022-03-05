<?php

require_once('dbCon.php');
require('libs/pdf/fpdf.php');

$tischRaumId = $_GET['tischRaumId'];

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

$x;
$y = 15;
$c = 0;
$count = 0;
$pdf = new PDF();

$pdf->AddPage();
$pdf->Line(105,0,105,500);
    $stmt = $pdo->prepare("SELECT tischNummer, tischRaumId FROM tblTisch where tischRaumId = ? order by tischRaumId, tischNummer");
    $stmt->execute([$tischRaumId]);      
        foreach ($stmt->fetchAll() as $row){
            if ($count == 3)
            {
                $count = 0;
                $pdf->AddPage();
                $y=5;
                $pdf->Line(105,0,105,500);
            }
            if ($c == 0){
                
                $url = urlencode($row["tischRaumId"].'/'.$row["tischNummer"]);
                $pdf->Image('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$url, 20, $y, NULL, NULL,'PNG');
                $pdf->SetY($y+3);
                $pdf->SetX(30);
                $pdf->SetFont('Arial','',14);
                $pdf->Write(5,$row["tischRaumId"].'/'.$row["tischNummer"]);
                $c=1;    
            }
            else if ($c == 1){
                
                $url = urlencode($row["tischRaumId"].'/'.$row["tischNummer"]);
                $pdf->Image('https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$url, 110, $y, NULL, NULL,'PNG');
                $pdf->SetY($y+3);
                $pdf->SetX(120);
                $pdf->SetFont('Arial','',14);
                $pdf->Write(5,$row["tischRaumId"].'/'.$row["tischNummer"]);
                $c=0;
                $count++;
                $y += 85;
                $pdf->Line(0,$y-1.5,300,$y-1.5);
            }
            
        }

$pdf->Output();



