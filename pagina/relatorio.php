<?php

$marca = $_POST['busca'];

//  RELATÓRIO

require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
    // Title
    $this->SetFont('Arial','',18);
    $this->Cell(0,6,'Relatorio',0,1,'C');
    $this->Ln(10);
    // Ensure table header is printed
    parent::Header();
}
}

// Connect to database
$link = mysqli_connect("localhost", "root", "", "concessionaria");

$pdf = new PDF();
$pdf->AddPage();
// Second table: specify 3 columns
$pdf->AddCol('issn',20,'','C');
$pdf->AddCol('ano',20,'','C');
$pdf->AddCol('modelo',40,'','C');
$pdf->AddCol('marca',40,'','C');

$prop = array('HeaderColor'=>array(255,150,100),
            'color1'=>array(210,245,255),
            'color2'=>array(255,255,210),
            'padding'=>2);
$pdf->Table($link,"select * from carro where marca ='".$marca."' order by issn ",$prop);
$pdf->Output();

