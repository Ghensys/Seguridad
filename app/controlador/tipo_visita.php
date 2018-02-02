<?php

require_once '../modelo/tipo_visita.php';

$obj_tipo_visita = new TipoVisita();
$tipo_visitas = $obj_tipo_visita->ListaTipoVisita();

if ($tipo_visitas)
{
	include '../vista/tipo_visita.php';
}