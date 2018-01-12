<?php

require_once '../modelo/visitante.php';

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];

$explode = explode("/", $_POST['fecha_nacimiento']);
$fecha_nacimiento = $explode[2]."-".$explode[1]."-".$explode[0];

$zona_residencia = $_POST['zona_residencia'];
$n_certificado = $_POST['n_certificado'];

if ($n_certificado == "")
{
	$n_certificado = 0;
}

$obj_visitante = new Visitante();
$registro = $obj_visitante->RegistrarVisitante($cedula,$nombre,$apellido,$fecha_nacimiento,$zona_residencia,$n_certificado);

if ($registro)
{
	header("Location:visitante.php?cedula=".$cedula."&token=1");
}
else
{
	echo "NO";
}