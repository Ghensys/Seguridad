<?php

require_once '../modelo/tipo_visita.php';

$id_tipo_visita = $_GET['id_tipo_visita'];

$obj_activar = new TipoVisita();
$activar = $obj_activar->ActivarTipoVisita($id_tipo_visita);

$mensaje = "Visita Activada Correctamente";

if ($activar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('tipo_visita.php');</script>"; 
}
else
{
	echo "error";
}