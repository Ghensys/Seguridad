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

	public function registrarNovedad($tipo_novedad,$descripcion_novedad)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "INSERT INTO public.novedad(id_tipo_novedad, descripcion_novedad)
				VALUES ('$tipo_novedad', '$descripcion_novedad');";

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