<?php

require_once 'conexion.php';

/**
 * Clase de Novedades
 */
class Novedad
{
	
	private $tipo_novedad;
	private $descripcion_novedad;

	function __construct()
	{
		$this->tipo_novedad="";
		$this->descripcion_novedad="";
	}

	public function tipoNovedad($tipo_novedad)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT 
				id_seguimiento
				FROM tipo_novedad
				WHERE id_tipo_novedad = '$tipo_novedad';";

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

	public function registrarNovedad($data)
	{
		$con = new Conexion();
		$con->Conectar();

		

		/*$sql = sprintf("INSERT INTO public.novedad(id_tipo_novedad, descripcion_novedad, estatus_novedad)
				VALUES ('%s', '%s','%s')",
				$data['tipo_novedad'],
			    $data['descripcion_novedad'],
			    $data['estatus_novedad']);

		$query = pg_query($sql);

		if ($query)
		{
			return $query;
		}
		else
		{
			return false;
		}*/

		print_r($data);
	}

	public function consultarNovedad($fecha_consulta)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT 
				novedad.id_novedad,
				novedad.descripcion_novedad,
				novedad.fecha_novedad,
				tipo_novedad.descripcion_tipo_novedad
				FROM novedad, tipo_novedad
				WHERE novedad.fecha_novedad BETWEEN '$fecha_consulta 00:00:00' AND '$fecha_consulta 23:59:59';";

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

	public function seguimientoNovedad()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "";

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