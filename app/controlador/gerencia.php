<?php

require_once '../modelo/gerencia.php';

$obj_gerencia = new Gerencia();
$gerencias = $obj_gerencia->ListaGerencia();

if ($gerencias)
{
	include '../vista/gerencia.php';
}