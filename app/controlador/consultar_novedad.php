<?php

require_once '../modelo/novedad.php';

$fecha_consulta = $_POST['fecha_inicio'];
$exp = explode("/", $fecha_consulta);
$fecha_consulta = $exp[2]."-".$exp[1]."-".$exp[0];

$consulta = new Novedad();
$data = $consulta->consultarNovedad($fecha_consulta);

if ($data)
{
	//$row = pg_fetch_assoc($data);
	include '../vista/tabla_novedad.php';
}
else
{
	echo "no trajo";
}