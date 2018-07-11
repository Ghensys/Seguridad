<?php

require 'conexion.php';

/**
* Clase para la tabla gerencias (CRUD)
*/

class Gerencia
{
	private $id_gerencia;
	private $descripcion_gerencia;
	
	function __construct()
	{
		$this->id_gerencia="";
		$this->descripcion_gerencia = '';
	}

	public function RegistrarGerencia($descripcion_gerencia)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "INSERT INTO public.gerencias(descripcion_gerencia, created_at, updated_at)
			    VALUES ('$descripcion_gerencia', NOW(), NOW());
";

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

	public function ListaGerencia()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT 
				gerencias.id,
				gerencias.descripcion_gerencia,
				gerencias.estatus_dato, 
				estatus_datos.descripcion_estatus_dato	
				FROM gerencias, estatus_datos
				WHERE gerencias.estatus_dato = estatus_datos.id ORDER BY descripcion_gerencia ASC;";

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

	public function BuscarIDGerencia($id_gerencia)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT * FROM gerencias WHERE id = '$id_gerencia'";

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

	public function ActualizarGerencia($id_gerencia,$descripcion_gerencia)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.gerencias SET descripcion_gerencia='$descripcion_gerencia', updated_at=NOW()
				WHERE id = '$id_gerencia';
";

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

	public function DesactivarGerencia($id_gerencia)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.gerencias SET updated_at=NOW(), estatus_dato=1 WHERE id = '$id_gerencia';";

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

	public function ActivarGerencia($id_gerencia)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.gerencias SET updated_at=NOW(), estatus_dato=0 WHERE id = '$id_gerencia';";

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