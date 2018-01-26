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

	//Registro de las Visitas (Entrada del Visitante)
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

	//Marcar la Salida del Visitante
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

	//Consulta individual del Historico del Visitante
	public function ConsultaVisitante($cedula,$fecha_inicio,$fecha_fin)
	{
		$con = new Conexion();
		$con->Conectar();

		$sql = "SELECT
				historico_visitantes.id, 
				historico_visitantes.cedula, 
				historico_visitantes.responsable,
				historico_visitantes.observacion, 
				historico_visitantes.n_pase, 
				historico_visitantes.created_at, 
				historico_visitantes.updated_at,
				gerencias.descripcion_gerencia, 
				tipo_visitas.descripcion_tipo_visita, 
				users.nombre, 
				users.apellido, 
				estatus.descripcion_estatus
				FROM 
				historico_visitantes, 
				gerencias, 
				tipo_visitas, 
				users, 
				estatus 
				WHERE 
				historico_visitantes.cedula = '$cedula' 
				AND historico_visitantes.id_gerencia = gerencias.id 
				AND historico_visitantes.id_tipo_visita = tipo_visitas.id 
				AND historico_visitantes.id_usuario = users.id
				AND historico_visitantes.estatus = estatus.id
				AND fecha_visita BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY created_at ASC;";

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

	//Consulta Variante (Gerencia y Tipo de Visita) 
	public function ConsultaGeneral($gerencia,$tipo_visita,$fecha_inicio,$fecha_fin)
	{
		$con = new Conexion();
		$con->Conectar();

		if ($gerencia == 0)
		{
			if ($tipo_visita == 0)
			{
				$sql = "SELECT 
						datos_visitantes.cedula,
						datos_visitantes.nombre,
						datos_visitantes.apellido,
						datos_visitantes.n_certificado,
						gerencias.descripcion_gerencia,
						tipo_visitas.descripcion_tipo_visita,
						historico_visitantes.responsable,
						historico_visitantes.created_at,
						historico_visitantes.updated_at
						FROM
						datos_visitantes,
						gerencias,
						tipo_visitas,
						historico_visitantes
						WHERE
						datos_visitantes.cedula = historico_visitantes.cedula
						AND
						historico_visitantes.id_gerencia = gerencias.id
						AND 
						historico_visitantes.id_tipo_visita = tipo_visitas.id
						AND
						fecha_visita BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY created_at ASC;";
			}
			elseif ($tipo_visita != 0)
			{
				$sql = "SELECT 
						datos_visitantes.cedula,
						datos_visitantes.nombre,
						datos_visitantes.apellido,
						datos_visitantes.n_certificado,
						gerencias.descripcion_gerencia,
						tipo_visitas.descripcion_tipo_visita,
						historico_visitantes.responsable,
						historico_visitantes.created_at,
						historico_visitantes.updated_at
						FROM
						datos_visitantes,
						gerencias,
						tipo_visitas,
						historico_visitantes
						WHERE
						historico_visitantes.id_tipo_visita = '$tipo_visita'
						AND
						datos_visitantes.cedula = historico_visitantes.cedula
						AND
						historico_visitantes.id_gerencia = gerencias.id
						AND 
						historico_visitantes.id_tipo_visita = tipo_visitas.id
						AND
						fecha_visita BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY created_at ASC;";
			}
		}
		elseif ($gerencia != 0)
		{
			if ($tipo_visita == 0)
			{
				$sql = "SELECT 
						datos_visitantes.cedula,
						datos_visitantes.nombre,
						datos_visitantes.apellido,
						datos_visitantes.n_certificado,
						gerencias.descripcion_gerencia,
						tipo_visitas.descripcion_tipo_visita,
						historico_visitantes.responsable,
						historico_visitantes.created_at,
						historico_visitantes.updated_at
						FROM
						datos_visitantes,
						gerencias,
						tipo_visitas,
						historico_visitantes
						WHERE
						historico_visitantes.id_gerencias = '$gerencia'
						AND
						datos_visitantes.cedula = historico_visitantes.cedula
						AND
						historico_visitantes.id_gerencia = gerencias.id
						AND 
						historico_visitantes.id_tipo_visita = tipo_visitas.id
						AND
						fecha_visita BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY created_at ASC;";
			}
			elseif ($tipo_visita != 0)
			{
				$sql = "SELECT 
						datos_visitantes.cedula,
						datos_visitantes.nombre,
						datos_visitantes.apellido,
						datos_visitantes.n_certificado,
						gerencias.descripcion_gerencia,
						tipo_visitas.descripcion_tipo_visita,
						historico_visitantes.responsable,
						historico_visitantes.created_at,
						historico_visitantes.updated_at
						FROM
						datos_visitantes,
						gerencias,
						tipo_visitas,
						historico_visitantes
						WHERE
						historico_visitantes.id_gerencia = '$gerencia'
						AND
						historico_visitantes.id_tipo_visita = '$tipo_visita'
						AND
						datos_visitantes.cedula = historico_visitantes.cedula
						AND
						historico_visitantes.id_gerencia = gerencias.id
						AND 
						historico_visitantes.id_tipo_visita = tipo_visitas.id
						AND
						fecha_visita BETWEEN '$fecha_inicio' AND '$fecha_fin' ORDER BY created_at ASC;";
			}
		}

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