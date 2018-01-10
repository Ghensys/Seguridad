<?php

require_once("../modelo/usuario.php");

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$id_perfil = $_POST['id_perfil'];

$user = new Usuario();
$ejecutar = $user->RegistrarUsuario($nombre,$apellido,$email,$password,$id_perfil);

if ($ejecutar)
{
	echo "Usuario Registrado Correctamente";
}
else
{
	echo "Error al Registrar";
}