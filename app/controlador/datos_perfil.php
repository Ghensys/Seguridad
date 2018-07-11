<?php

require_once '../modelo/usuario.php';

$id_usuario = $_GET['id_usuario'];

$obj_perfil = new Usuario();
$perfil =$obj_perfil->BuscarIDPerfil($id_usuario);

if ($perfil)
{
	$row = pg_fetch_array($perfil);

	include '../vista/actualizar_perfil.php';
}
else
{
	echo "error";
}