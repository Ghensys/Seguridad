<?php

require 'conexion.php';

/**
* Clase para Usuarios
*/

class TipoVisita
{
	private $id_tipo_visita;
	private $descripcion_tipo_visita;
	
	function __construct()
	{
		$this->id_tipo_visita="";
		$this->descripcion_tipo_visita = '';
	}

	public function RegistrarTipoVisita($descripcion_tipo_visita)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "INSERT INTO public.tipo_visitas(descripcion_tipo_visita, created_at, updated_at)
			    VALUES ('$descripcion_tipo_visita', NOW(), NOW());
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

	public function ListaTipoVisita()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT 
				tipo_visitas.id,
				tipo_visitas.descripcion_tipo_visita,
				tipo_visitas.estatus_dato, 
				estatus_datos.descripcion_estatus_dato	
				FROM tipo_visitas, estatus_datos
				WHERE tipo_visitas.estatus_dato = estatus_datos.id ORDER BY descripcion_tipo_visita ASC;";

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

	public function BuscarIDTipoVisita($id_tipo_visita)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT * FROM tipo_visitas WHERE id = '$id_tipo_visita'";

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

	public function ActualizarTipoVisita($id_tipo_visita,$descripcion_tipo_visita)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.tipo_visitas SET descripcion_tipo_visita='$descripcion_tipo_visita', updated_at=NOW()
				WHERE id = '$id_tipo_visita';
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

	public function DesactivarTipoVisita($id_tipo_visita)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.tipo_visitas SET updated_at=NOW(), estatus_dato=1 WHERE id = '$id_tipo_visita';";

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

	public function ActivarTipoVisita($id_tipo_visita)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.tipo_visitas SET updated_at=NOW(), estatus_dato=0 WHERE id = '$id_tipo_visita';";

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