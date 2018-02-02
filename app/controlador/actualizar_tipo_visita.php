<?php

require_once '../modelo/tipo_visita.php';

$id_tipo_visita = $_POST['id_tipo_visita'];
$descripcion_tipo_visita = $_POST['descripcion_tipo_visita'];

$obj_actualizar = new TipoVisita();
$actualizar = $obj_actualizar->ActualizarTipoVisita($id_tipo_visita,$descripcion_tipo_visita);

$mensaje = "Tipo de Visita Actualizado Satisfactoriamente.";
$error = "Error al Actualizar el Tipo de Visita, comuniquese con el administrador del sistema.";

if ($actualizar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../controlador/tipo_visita.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../controlador/tipo_visita.php');</script>"; 
}