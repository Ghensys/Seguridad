<?php

require_once '../modelo/historico_visitante.php';

$cedula = $_POST['cedula'];
$gerencia = $_POST['gerencia'];
$tipo_visita = $_POST['tipo_visita'];
$responsable = $_POST['responsable'];
$usuario = $_POST['usuario'];
$observacion = $_POST['observacion'];
$n_pase = $_POST['n_pase'];

$obj_visita = new HistoricoVisitante();
$obj_visita->validarPase($n_pase);

if ($obj_visita)
{
	$obj_visita = new HistoricoVisitante();
	$registro = $obj_visita->RegistrarVisita($cedula,$gerencia,$tipo_visita,$responsable,$usuario,$observacion,$n_pase);
	$mensaje = "Visita Registrada Correctamente";
	$error = "Error al Registrar la Visita";

	if ($registro)
	{
		echo "<script>alert('$mensaje')</script>";
		echo "<script>window.location.replace('../vista/');</script>"; 
	}
	else
	{
		echo "<script>alert('$error')</script>";
		echo "<script>window.location.replace('../vista/');</script>"; 
	}
}
else
{
	$error = "El número de pase se encuentra activo";
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../vista/');</script>"; 
}

