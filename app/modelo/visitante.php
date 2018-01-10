<?php

require 'conexion.php';

/**
* Clase para Visitantes
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
		$con->conectar();

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


}