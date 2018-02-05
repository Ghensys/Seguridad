<?php

require 'conexion.php';

/**
* Clase para Usuarios
*/

class Usuario
{
	private $id_usuario;
	private $nombre;
	private $apellido;
	private $email;
	private $password;
	private $id_perfil;
	
	function __construct()
	{
		$this->id_usuario="";
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

	public function ListaPerfil()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT users.id,
				users.nombre,
				users.apellido, 
				users.email,
				users.estatus_dato,
				estatus_datos.descripcion_estatus_dato,
				perfils.descripcion_perfil 
				FROM users, perfils, estatus_datos
				WHERE users.id_perfil = perfils.id
				AND users.estatus_dato = estatus_datos.id;";

		$query = pg_query($sql);

		if ($query)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}

	public function BuscarIDPerfil($id_usuario)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT users.id,
				users.nombre,
				users.apellido, 
				users.email,
				users.password,
				perfils.descripcion_perfil 
				FROM users, perfils
				WHERE 
				users.id = '$id_usuario'
				AND users.id_perfil = perfils.id;";

		$query = pg_query($sql);

		if ($query)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}

	public function ActualizarPerfil($id_usuario,$nombre,$apellido,$email,$password,$id_perfil)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.users SET nombre='$nombre', apellido='$apellido', email='$email', password='$password', id_perfil='$id_perfil', updated_at= NOW() WHERE id = '$id_usuario';";

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

	public function DesactivarPerfil($id_usuario)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.users SET updated_at=NOW(), estatus_dato=1
			 	WHERE id = '$id_usuario';";

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

	public function ActivarPerfil($id_usuario)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.users SET updated_at=NOW(), estatus_dato=0
			 	WHERE id = '$id_usuario';";

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
}