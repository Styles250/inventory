<?php
session_start();
require "../pdf/fpdf.php";
require "../connection.php";
$pdf=new FPDF();
$pdf->addpage();
$pdf->setfont("arial","B",12);
$query=$_SESSION['session_query'];;
$pdf->Cell(50,10,"STOCK OVERVIEW REPORT",0,1);
$pdf->Cell(10,10,"#",1,0,"C");
$pdf->Cell(70,10,"Name",1,0,"C");
$pdf->Cell(40,10,"Price",1,0,"C");
$pdf->Cell(20,10,"Quantity",1,0,"C");
$pdf->Cell(50,10,"Total-Price",1,1,"C");

$execute=mysqli_query($connect,$query);
$no=1;
        $total_value=0;
        $pdf->setfont("arial","",12);
        while($stock=mysqli_fetch_array($execute)){
            $total_price=$stock['price']*$stock['quantity'];
                $pdf->cell(10,10,$no,1,0);
                $pdf->cell(70,10,$stock['name'],1,0);
                $pdf->cell(40,10,$stock['price']." Rwf",1,0);
                $pdf->cell(20,10,$stock['quantity'],1,0);
                $pdf->cell(50,10,$total_price." Rwf",1,1);
        
            $total_value=$total_value+$total_price;
            $no++;
        }
            $pdf->setfont("arial","",12);
            $pdf->cell(130,10,"STOCK VALUE",1,0,"C");
            $pdf->setfont("arial","B",12);
            $pdf->cell(60,10,$total_value." Rwf",1,1,"C");

$pdf->output();
?>