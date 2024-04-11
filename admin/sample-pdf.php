<?php
require "../pdf/fpdf.php";
$report= new FPDF();
$report->addpage();
$report->setfont("arial","B",15);
$report->cell(40,10,"welcome",1,1,"L");
$report->cell(40,10,"welcome",1,1);
$report->output();
?>