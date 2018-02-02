<?php

require_once '../modelo/tipo_visita.php';

$id_tipo_visita = $_GET['id_tipo_visita'];

$obj_tipo_visita = new TipoVisita();
$tipo_visita =$obj_tipo_visita->BuscarIDTipoVisita($id_tipo_visita);

if ($tipo_visita)
{
	$row = pg_fetch_array($tipo_visita);

	include '../vista/actualizar_tipo_visita.php';
}
else
{
	echo "error";
}