<?php

require_once '../modelo/gerencia.php';

$id_gerencia = $_GET['id_gerencia'];

$obj_desactivar = new Gerencia();
$desactivar = $obj_desactivar->DesactivarGerencia($id_gerencia);

$mensaje = "Gerencia Desactivada Correctamente";

if ($desactivar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('gerencia.php');</script>"; 
}
else
{
	echo "error";
}