<?php

require_once '../modelo/gerencia.php';

$id_gerencia = $_GET['id_gerencia'];

$obj_activar = new Gerencia();
$activar = $obj_activar->ActivarGerencia($id_gerencia);

$mensaje = "Gerencia Activado Correctamente";

if ($activar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('gerencia.php');</script>"; 
}
else
{
	echo "error";
}