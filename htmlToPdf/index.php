<?php
    
    include_once('./vendor/autoload.php');
    use mikehaertl\wkhtmlto\Pdf;

    ob_start();
    require './plantilla.php';
    $content = ob_get_clean();

    $pdf = new Pdf(array(
        'user-style-sheet' => realpath('./estilo.php')
    ));
    $pdf->binary = 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf';
    $pdf->setOptions(array(
        'orientation' => 'landscape'
    ));
    $pdf->addPage($content);
    $pdf->send('constancy.pdf');
?>