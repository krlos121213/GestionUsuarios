<?php

class ControlConexion{
	
	var $conn;
	//constructor de la clase
	function __construct(){
		$this->conn=null;
	}

	//funcion para abrir bd, recibe como parametros, servidor, usuario, contrasena y nombre de la bd
    function abrirBd($servidor, $usuario, $password,$db){
    	try	{
			$this->conn = new mysqli($servidor, $usuario, $password, $db);
			if ($this->conn->connect_errno) {
			printf("Connect failed: %s\n", $this->conn->connect_error);
			exit();
			}
      	}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}

    }
	//funcion para cerrar la bd

    function cerrarBd() {
		try{
       $this->conn->close();
		}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}		
    }
	// funcion para ejecutar comandos sql
    function ejecutarComandoSql($sql) {
    	try	{
			$this->conn->query($sql);
			}
		catch (Exception $e) {
				echo " NO SE AFECTARON LOS REGISTROS: ". $e->getMessage()."\n";
		  }	
		}

	// funcion para ejecutar select sql

	function ejecutarSelect($sql) {
			try	{
				$recordSet=$this->conn->query($sql);
				}
	
			catch (Exception $e) {
					echo " ERROR: ". $e->getMessage()."\n";
			  }	
		return $recordSet;
			}   
}
?>