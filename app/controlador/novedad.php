<?php

require_once '../modelo/novedad.php';

$obj_novedad = new Novedad();
$novedades = $obj_novedad->ListaNovedad();

if ($novedades)
{
	include '../vista/novedades.php';
}
