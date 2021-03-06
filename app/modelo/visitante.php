<?php

require 'conexion.php';

/**
* Clase para los datos de los Visitantes
*/
class Visitante
{
	private $cedula;
	private $nombre;
	private $apellido;
	private $fecha_nacimiento;
	private $zona_residencia;
	private $n_certificado;
	private $urlImg;
	private $created_at;
	private $updated_at;

	function __construct()
	{
		$this->cedula="";
		$this->nombre="";
		$this->apellido="";
		$this->fecha_nacimiento="";
		$this->zona_residencia="";
		$this->n_certificado="";
		$this->urlImg="";
		$this->created_at="";
		$this->updated_at="";
	}

	public function VerificarVisitante($cedula)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT * FROM datos_visitantes WHERE cedula = '$cedula';";

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

	public function RegistrarVisitante($cedula,$nombre,$apellido,$fecha_nacimiento,$zona_residencia,$n_certificado)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "INSERT INTO public.datos_visitantes(cedula, nombre, apellido, fecha_nacimiento, zona_residencia, n_certificado, created_at, updated_at) VALUES ('$cedula','$nombre','$apellido','$fecha_nacimiento','$zona_residencia','$n_certificado', NOW(), NOW());";

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

	public function EstadoVisita($cedula)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT estatus FROM public.historico_visitantes WHERE cedula = '$cedula' ORDER BY id DESC LIMIT 1;";

		$query = pg_query($sql);

		if (pg_num_rows($query)>0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}


}