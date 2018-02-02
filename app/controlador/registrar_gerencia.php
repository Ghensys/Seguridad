<?php

require_once("../modelo/gerencia.php");

$descripcion_gerencia = $_POST['descripcion_gerencia'];

$obj_gerencia = new Gerencia();
$registro = $obj_gerencia->RegistrarGerencia($descripcion_gerencia);

$mensaje = "Gerencia Registrada Satisfactoriamente.";
$error = "Error al Registrar la Gerencia, comuniquese con el administrador del sistema.";

if ($registro)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../controlador/gerencia.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../controlador/gerencia.php');</script>"; 
}