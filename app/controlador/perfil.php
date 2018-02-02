<?php

require_once '../modelo/usuario.php';

$obj_perfil = new Usuario();
$perfiles = $obj_perfil->ListaPerfil();

if ($perfiles)
{
	include '../vista/perfil.php';
}