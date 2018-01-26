<?php

require_once '../modelo/lista.php';

$obj_gerencia = new Lista();
$r1 = $obj_gerencia->Gerencia();

if ($r1)
{
	$gerencia = pg_fetch_row($r1);

	$obj_visita = new Lista();
	$r2 = $obj_visita->TipoVisita();

	if ($r2)
	{
		$tipo_visita = pg_fetch_row($r2);
	}

}


