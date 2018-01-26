<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$cedula = $_POST['cedula'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

require_once '../../modelo/historico_visitante.php';
$obj_consulta = new HistoricoVisitante();
$consulta = $obj_consulta->ConsultaVisitante($cedula,$fecha_inicio,$fecha_fin);


$mpdf = new \Mpdf\Mpdf();

//$html = "<h3>Hello world!</h3>";


//$mpdf->WriteHTML($html);
//$mpdf->Output();

//$mpdf=new mPDF('win-1252','A4-L','','',15,10,16,10,10,10);

$txt = "Reporte de Visitantes - ".$cedula;

$title = $mpdf->SetHeader($txt.'|');


$mpdf->setFooter('{PAGENO}');
$mpdf->useOnlyCoreFonts = true;
$mpdf->SetDisplayMode('fullpage');


//Amortiguar el siguiente código HTML con PHP para poder almacenarlo en una variable más adelante
ob_start();

include "tabla_visitante.php";//La vista que se quiera convertir en PDF

$html = ob_get_clean();

ob_end_clean();

//Enviar el código HTML capturado desde el buffer de salida a la clase MPDF para su procesamiento
//$stylesheet = file_get_contents('../../../css/bootstrap.min.css'); // external css
//$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html);
//$mpdf->SetProtection(array(), 'Roynabek2016', '');//Para contraseña de tu PDF


$mpdf->SetTitle($txt);
$mpdf->Output($txt.'.pdf','I');exit;
exit;
