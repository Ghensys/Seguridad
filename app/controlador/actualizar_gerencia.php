<?php

require_once '../modelo/gerencia.php';

$id_gerencia = $_POST['id_gerencia'];
$descripcion_gerencia = $_POST['descripcion_gerencia'];

$obj_actualizar = new Gerencia();
$actualizar = $obj_actualizar->ActualizarGerencia($id_gerencia,$descripcion_gerencia);

$mensaje = "Gerencia Actualizado Satisfactoriamente.";
$error = "Error al Actualizar la Gerencia, comuniquese con el administrador del sistema.";

if ($actualizar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../controlador/gerencia.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../controlador/gerencia.php');</script>";
}