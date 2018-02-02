<?php

require_once '../modelo/gerencia.php';

$id_gerencia = $_GET['id_gerencia'];

$obj_gerencia = new Gerencia();
$gerencia =$obj_gerencia->BuscarIDGerencia($id_gerencia);

if ($gerencia)
{
	$row = pg_fetch_array($gerencia);

	include '../vista/actualizar_gerencia.php';
}
else
{
	echo "error";
}