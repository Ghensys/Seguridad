<?php 

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
		$this->usuario = "postgres";
		$this->password = "conapdis";
		$this->db = "SistemaSeguridad5.4";
	}
	//metodo para conectar
	public function conectar()
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
?>
