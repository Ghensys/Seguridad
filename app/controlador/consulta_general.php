<?php

require_once '../modelo/historico_visitante.php';

$gerencia = $_POST['gerencia'];
$tipo_visita = $_POST['tipo_visita'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$obj_consulta = new HistoricoVisitante();
$consulta = $obj_consulta->ConsultaGeneral($gerencia,$tipo_visita,$fecha_inicio,$fecha_fin);

if ($consulta)
{
	include '../vista/tabla_general.php';
}