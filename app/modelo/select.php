<?php

require_once 'conexion.php';


/**
* Datos de los Select (Listas Desplegables en los Formularios)
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

		echo "<select name='gerencia' class='form-control' required>;";
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

		echo "<select name='tipo_visita' class='form-control' required>;";
		echo "<option value='0'>General</option>";

		while ($row = pg_fetch_row($query))
		{
			echo "<option value=".$row[0].">".$row[1]."</option>";
		}

		echo "</select>";
	}

	public function TipoPerfil()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT * FROM perfils WHERE id != 0 ORDER BY descripcion_perfil ASC;";

		$query = pg_query($sql);

		echo "<select name='id_perfil' class='form-control' required>;";
		echo "<option value='' selected>Seleccionar</option>";

		while ($row = pg_fetch_row($query))
		{
			echo "<option value=".$row[0].">".$row[1]."</option>";
		}

		echo "</select>";
	}

	public function TipoNovedad()
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT * FROM tipo_novedad ORDER BY descripcion_tipo_novedad ASC;";

		$query = pg_query($sql);

		echo "<select name='tipo_novedad' class='form-control' required>;";
		echo "<option value='' selected>Seleccionar</option>";

		while ($row = pg_fetch_row($query))
		{
			echo "<option value=".$row[0].">".$row[1]."</option>";
		}

		echo "</select>";
	}

}