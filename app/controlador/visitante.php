<?php

require '../modelo/visitante.php';

error_reporting(0);

$cedula = $_REQUEST['cedula'];
$token = $_REQUEST['token'];

$obj_visitante = new Visitante();
$visitante = $obj_visitante->VerificarVisitante($cedula);

if (pg_num_rows($visitante)>0)
{

	$obj_visita = new Visitante();
	$estatus = $obj_visita->EstadoVisita($cedula);

	

	$row = pg_fetch_array($visitante);

	if ($token == 1)
	{
		require_once '../vista/informacion_visitante-redit.phtml';
	}else
	{
		require_once '../vista/informacion_visitante.phtml';
	}
}
else
{
	require_once '../vista/registrar_visitante.phtml';
}