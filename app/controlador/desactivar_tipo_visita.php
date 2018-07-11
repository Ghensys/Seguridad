<?php

require_once '../modelo/tipo_visita.php';

$id_tipo_visita = $_GET['id_tipo_visita'];

$obj_desactivar = new TipoVisita();
$desactivar = $obj_desactivar->DesactivarTipoVisita($id_tipo_visita);

$mensaje = "Visita Desactivada Correctamente";

if ($desactivar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('tipo_visita.php');</script>"; 
}
else
{
	echo "error";
}