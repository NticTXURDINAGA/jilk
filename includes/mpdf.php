<?php
    include '../mpdf60/mpdf.php';
    $mpdf=new mPDF('c');

    $mpdf->WriteHTML($_POST['pdf']);

    // Genera el fichero y fuerza la descarga
  //  $mpdf->Output(‘nombre.pdf’,’F’); exit;

    $mpdf->Output();
    exit;
?>
