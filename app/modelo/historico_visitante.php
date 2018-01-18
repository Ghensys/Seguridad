<?php

require_once 'conexion.php';

/**
* Clase para la Tabla de Movimientos del Visitante (Historico)
*/
class HistoricoVisitante
{
	
	private $cedula;
	private $gerencia;
	private $tipo_visita;
	private $responsable;
	private $usuario_nombre;
	private $usuario_apellido;
	private $observacion;
	private $n_pase;

	function __construct()
	{
		$this->cedula="";
		$this->gerencia="";
		$this->tipo_visita="";
		$this->responsable="";
		$this->usuario_nombre="";
		$this->usuario_apellido="";
		$this->observacion="";
		$this->n_pase="";
	}

	public function RegistrarVisita($cedula,$gerencia,$tipo_visita,$responsable,$usuario,$observacion,$n_pase)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "INSERT INTO public.historico_visitantes(cedula, id_gerencia, id_tipo_visita, responsable, id_usuario, observacion, n_pase, created_at, updated_at) VALUES ('$cedula','$gerencia','$tipo_visita','$responsable','$usuario','$observacion','$n_pase', NOW(), NOW()) ;";

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

	public function MarcarSalida($cedula)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "UPDATE public.historico_visitantes SET estatus = 0, updated_at = NOW() WHERE cedula = '$cedula' AND estatus = 1;";

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

	public function ConsultaVisitante($cedula,$fecha_inicio,$fecha_fin)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT id, cedula, gerencias.descripcion_gerencia, tipo_visitas.descripcion_tipo_visita, responsable, users.nombre, users.apellido, observacion, n_pase, estatus, created_at, updated_at FROM public.historico_visitantes, gerencias, tipo_visitas, users, estatus WHERE historico_visitantes.cedula = '$cedula' AND historico_visitantes;
";
	}
}