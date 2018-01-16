<?php

require_once '../modelo/historico_visitante.php';

$cedula = $_POST['cedula'];

$obj_salida = new HistoricoVisitante();
$salida = $obj_salida->MarcarSalida($cedula);

$mensaje = "Salida Marcada Correctamente";

if ($salida)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../vista/');</script>"; 
}
else
{
	echo "error";
}