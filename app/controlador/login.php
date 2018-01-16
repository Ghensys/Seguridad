<?php
require_once("../modelo/usuario.php");
require_once("../modelo/conexion.php");

$email = $_POST['email'];
$password = $_POST['password'];

$obj_usuario = new Usuario();
$login = $obj_usuario->IniciarSesion($email,$password);

if ($login)
{

	$obj_conex = new conexion();
	$obj_conex->conectar();

	$sql = "SELECT id, nombre, apellido, email, password, id_perfil, remember_token, created_at, updated_at
			FROM public.users WHERE email = '$email';";

	$query = pg_query($sql);

	$row = pg_fetch_assoc($query);

	//print_r($row);
	session_start();
	$_SESSION['id'] = $row['id'];
	$_SESSION['email']= $email;
	$_SESSION['nombre'] = $row['nombre'];
	$_SESSION['apellido'] = $row['apellido'];
	$_SESSION['id_perfil'] = $row['id_perfil'];
	header("Location:../vista/");

}else
{
	echo "ERROR";
	//header("Location:../../");
}