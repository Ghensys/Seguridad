<?php

require_once '../modelo/historico_visitante.php';

$cedula = $_POST['cedula'];

$exp1 = explode("/", $_POST['fecha_inicio']);
$fecha_inicio = $exp1[2]."-".$exp1[1]."-".$exp1[0];

$exp2 = explode("/", $_POST['fecha_fin']);
$fecha_fin = $exp2[2]."-".$exp2[1]."-".$exp2[0];

$obj_consulta = new HistoricoVisitante();
$resultado_consulta = $obj_consulta->ConsultaVisitante($cedula,$fecha_inicio,$fecha_fin);

if ($resultado_consulta)
{
	include '../vista/tabla_visitante.php';
}
