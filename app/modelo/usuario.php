<?php

/**
* Clase para Usuarios
*/

require 'conexion.php';
class Usuario
{
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $id_perfil;
	
	function __construct()
	{
		$this->nombre = '';
		$this->apellido = '';
		$this->email = '';
		$this->password = '';
		$this->id_perfil = '';
	}

	public function RegistrarUsuario($nombre,$apellido,$email,$password,$id_perfil)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "INSERT INTO public.users(nombre, apellido, email, password, id_perfil, created_at, updated_at) VALUES ('$nombre','$apellido','$email','$password','$id_perfil', NOW(), NOW());";

    	$query = pg_query($sql);

    	if ($query) 
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
	}

	public function IniciarSesion($email,$password)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT nombre, apellido, id_perfil FROM users WHERE email = '$email' AND password = '$password'; ";

		$query = pg_query($sql);

		if (pg_num_rows($query)>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
}