<?php

require_once 'conexion.php';


/**
* Datos de los Select
*/
class Select
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

		echo "<select name='gerencia' required>;";
		echo "<option value='0'>General</option>";

		while ($row = pg_fetch_row($query))
		{
			echo "<option value=".$row[0].">".$row[1]."</option>";
		}

		echo "</select>";
	}

	public function TipoVisita()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT id, descripcion_tipo_visita FROM tipo_visitas;";

		$query = pg_query($sql);

		echo "<select name='tipo_visita' required>;";
		echo "<option value='0'>General</option>";

		while ($row = pg_fetch_row($query))
		{
			echo "<option value=".$row[0].">".$row[1]."</option>";
		}

		echo "</select>";
	}

}