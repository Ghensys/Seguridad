<?php

require '../modelo/visitante.php';

$cedula = $_POST['cedula'];

$obj_visitante = new Visitante();
$visitante = $obj_visitante->VerificarVisitante($cedula);

if ($visitante)
{
	$row = pg_fetch_array($visitante);
	require_once '../vista/informacion_visitante.phtml';
}