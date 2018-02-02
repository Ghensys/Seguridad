<?php

require_once '../modelo/usuario.php';

$id_usuario = $_POST['id_usuario'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_perfil = $_POST['id_perfil'];

$obj_actualizar = new Usuario();
$actualizar = $obj_actualizar->ActualizarPerfil($id_usuario,$nombre,$apellido,$email,$password,$id_perfil);

$mensaje = "Perfil Actualizado Satisfactoriamente.";
$error = "Error al Actualizar el Perfil, comuniquese con el administrador del sistema.";

if ($actualizar)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../controlador/perfil.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../controlador/perfil.php');</script>"; 
}