<?php

require_once '../modelo/usuario.php';

$id_usuario = $_GET['id_usuario'];

$obj_activar = new Usuario();
$activar = $obj_activar->ActivarPerfil($id_usuario);

$mensaje = "Usuario Activado Correctamente";

if ($activar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('perfil.php');</script>"; 
}
else
{
	echo "error";
}