<?php

require_once("../modelo/usuario.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_perfil = $_POST['id_perfil'];

$obj_usuario = new Usuario();
$registro = $obj_usuario->RegistrarUsuario($nombre,$apellido,$email,$password,$id_perfil);

$mensaje = "Perfil Registrado Satisfactoriamente.";
$error = "Error al Registrar el Perfil, comuniquese con el administrador del sistema.";

if ($registro)
{
	echo "<script>alert('$mensaje')</script>";
	echo "<script>window.location.replace('../controlador/perfil.php');</script>"; 
}
else
{
	echo "<script>alert('$error')</script>";
	echo "<script>window.location.replace('../controlador/perfil.php');</script>"; 
}