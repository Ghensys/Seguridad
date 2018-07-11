<?php

require_once '../modelo/usuario.php';

$id_usuario = $_GET['id_usuario'];

$obj_desactivar = new Usuario();
$desactivar = $obj_desactivar->DesactivarPerfil($id_usuario);

$mensaje = "Usuario Desactivado Correctamente";

if ($desactivar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('perfil.php');</script>"; 
}
else
{
	echo "error";
}