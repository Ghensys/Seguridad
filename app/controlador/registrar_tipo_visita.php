<?php

require_once("../modelo/tipo_visita.php");

$descripcion_tipo_visita = $_POST['descripcion_tipo_visita'];

$obj_tipo_visita = new TipoVisita();
$registro = $obj_tipo_visita->RegistrarTipoVisita($descripcion_tipo_visita);

$mensaje = "Tipo de Visita Registrada Satisfactoriamente.";
$error = "Error al Registrar el Tipo de Visita, comuniquese con el administrador del sistema.";

if ($registro)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../controlador/tipo_visita.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../controlador/tipo_visita.php');</script>"; 
}