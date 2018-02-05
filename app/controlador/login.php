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

	$sql = "SELECT id, nombre, apellido, email, password, id_perfil, remember_token, created_at, updated_at, estatus_dato
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
	$_SESSION['estatus_dato'] = $row['estatus_dato'];

	header("Location:../vista/");

}else
{
  $mensaje = "Correo o contraseña invalida, verifique los datos o comuniquese con el administrador del sistema.";

  echo "<script>alert('$mensaje')</script>";
  echo "<script>window.location.replace('../../');</script>";
}
