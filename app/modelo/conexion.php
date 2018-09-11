<?php

/**
*	Clase de Conexion a la Base de Datos
*/
class Conexion{

	private $host;
	private $puerto;
	private $usuario;
	private $password;
	private $db;
	private $con;

	//Constructor
	public function Conexion()
	{
		$this->host = "localhost";
		$this->puerto = "5432";
		$this->usuario = "grv_bancoex";
		$this->password = "bancoex2018.";
		$this->db = "ss";
	}
	//metodo para conectar
	public function Conectar()
	{
		$this->con = pg_connect("host = $this->host port = $this->puerto user=$this->usuario password= $this->password dbname = $this->db");
		//validacion
		if($this->con){

			return true;

		}else{

			return false;
		}


	}

}
