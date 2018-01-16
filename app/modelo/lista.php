<?php

require_once 'conexion.php';


/**
* Datos de los Select
*/
class Lista
{
	private $id;
	private $descripcion;

	function __construct()
	{
		$this->id="";
		$this->descripcion="";
	}

	public function Gerencia()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT id, descripcion_gerencia FROM gerencias;";

		$query = pg_query($sql);

		if ($query)
		{
			return $query;
		}
		else
		{
			return false;;
		}
	}

	public function TipoVisita()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT id, descripcion_tipo_visita FROM tipo_visitas;";

		$query = pg_query($sql);

		if ($query)
		{
			return $query;
		}
		else
		{
			return false;;
		}
	}

}